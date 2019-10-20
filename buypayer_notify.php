<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';

$query = $db->from('ayarlar')
    ->all();

$buypayerKey = $query[0]['ApiKey'];

	if($_POST){
				  $SiparisID = strip_tags($_POST["sipid"]);
				  $Sifre = strip_tags($_POST['sifre']);
				  $tutar = strip_tags($_POST["itt"]);
				  $durum = strip_tags($_POST['opr']);

				   if($SiparisID == "" || $Sifre == "" || $tutar == "" || $durum == "" )
				   {
					  echo "eksik veri";
					  exit();
				   }
				
				if ($buypayerKey == $Sifre ) {

                    $odemeKontrol = $db->from('buypayer')
                        ->where('Id',$SiparisID)
                        ->where('Durum','Beklemede')
                        ->all();

					$KullaniciId = $odemeKontrol[0]['KullaniciId'];
					$KullaniciAdi = $odemeKontrol[0]['KullaniciAdi'];

					if ($durum=="success") {
                        $kullaniciKontrol = $db->from('kullanicilar')
                            ->where('Id',$KullaniciId)
                            ->all();

						  if( count($kullaniciKontrol) > 0){

						  		$Bakiye = $kullaniciKontrol[0]['Bakiye'] + $tutar ;
                             	 $yukle = $db->update('kullanicilar')
                                  ->where('Id', $KullaniciId)
                                  ->where('KullaniciAdi', $KullaniciAdi)
                                  ->set([
                                      'Bakiye' => $Bakiye
                                  ]);

                              	$guncelle = $db->update('buypayer')
                                  ->where('Id', $SiparisID)
                                  ->set([
                                      'Durum' => 'Tamamlandı'
                                  ]);
						  }
					}else{
						echo "yukleme gerceklestirilemedi";
					}

				}else{
					echo "Key yanlış";
				}
}
?>
									
									
								
