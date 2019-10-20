<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';

$query = $db->from('ayarlar')
    ->all();
$apiKey = $query[0]['ApiKey'];
$apiSecret = $query[0]['ApiSecret'];
$date = date("Y-m-d H:i:s");

	include_once("paywant/paywant.lib.php");

	date_default_timezone_set('Europe/Istanbul');

					  
	if($_POST){
				  $SiparisID = paywantAntiInjection($_POST["SiparisID"]);
				  $ExtraData= paywantAntiInjection($_POST["ExtraData"]);
				  $UserID= paywantAntiInjection($_POST["UserID"]);
				  $ReturnData= paywantAntiInjection($_POST["ReturnData"]);
				  $Status= paywantAntiInjection($_POST["Status"]);
				  $OdemeKanali= paywantAntiInjection($_POST["OdemeKanali"]);
				  $OdemeTutari= paywantAntiInjection($_POST["OdemeTutari"]);
				  $NetKazanc= paywantAntiInjection($_POST["NetKazanc"]);
				  $Hash= $_POST["Hash"];

				   if($SiparisID == "" || $ExtraData == "" || $UserID == "" || $ReturnData == "" || $Status == "" || $OdemeKanali == "" || $OdemeTutari == "" || $NetKazanc == "" || $Hash == "")
				   {
					  echo "eksik veri";
					  exit();
				   }
				
				
				$hashKontrol = base64_encode(hash_hmac('sha256',"$SiparisID|$ExtraData|$UserID|$ReturnData|$Status|$OdemeKanali|$OdemeTutari|$NetKazanc".$apiKey,$apiSecret,true));
				  if($Hash != $hashKontrol)
				   exit("hash hatali");

                    $kontrol = $db->from('kullanicilar')
                    ->where('Id',$UserID)
                    ->where('KullaniciAdi',$ReturnData)
                    ->all();
				  if(count($kontrol) > 0){
					  /// kullanıcı var, yükleme yapılaiblir.

                      $siparisKontrol = $db->from('paywant')
                          ->where('SiparisID',$SiparisID)
                          ->all();
					 if(count($siparisKontrol) > 0){
						  // daha önce yükleme olmuş, işlem yapma "1 " döndür
						 exit("OK");
					  }else{
							// daha önce yükleme olmamış ,devam
                            $kayitGir = $db->insert('paywant')
                             ->set(array(
                                 "SiparisID" => $SiparisID,
                                 "UserID" => $UserID,
                                 "ReturnData" => $ReturnData,
                                 "Status" => $Status,
                                 "OdemeKanali" => $OdemeKanali,
                                 "OdemeTutari" => $OdemeTutari,
                                 "NetKazanc" => $NetKazanc,
                                 "ExtraData" => $ExtraData,
                                 "Tarih" => $date
                             ));
							if($kayitGir)
							{
								// log girildi kontrol yapıp yükleyelim
								if($Status  == "100")
								{

                                    $kullanici = $db->from('kullanicilar')
                                        ->where('Id',$UserID)
                                        ->where('KullaniciAdi',$ReturnData)
                                        ->all();
                                    $bakiyeGuncelle = $kullanici[0]['Bakiye'] + $ExtraData;

                                    $yukle = $db->update('kullanicilar')
                                        ->where('Id',$UserID)
                                        ->where('KullaniciAdi',$ReturnData)
                                        ->set([
                                            'Bakiye' => $bakiyeGuncelle
                                        ]);
									if($yukle)
									{
										exit("OK");
									}else{
										echo "yukleme gerceklestirilemedi.";
									}
								}else{
									// 101 , ödeme iptal edildi
									exit("OK");
								}
							}else{
								// log girilmedi 
								echo "log girilemedi";
							}

					  }
					  
				
				  }else{
					  echo "kullanici yok";
				  }
				 
				   //echo 1;
				}else
					exit("post yok");




