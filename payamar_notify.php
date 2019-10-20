<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';
date_default_timezone_set('Europe/Istanbul');

$query = $db->from('ayarlar')
    ->all();
$key 			= $query[0]['ApiKey'];
$secret 		= $query[0]['ApiSecret'];
$date 			= date("Y-m-d H:i:s");


	## PAYAMAR TARAFINDAN SİZE GÖNDERİLEN POST DEĞERLERİ
	/*

	  payment_status 			=> success
	  payment_type 				=> 2
	  payment_merchant_oid 		=> 75126 
	  payment_total_amount 		=> 5000
	  payment_amount 			=> 5000 
	  payment_installment_count => 1
	  payment_gain 				=> 50  (Kazançınız)
	  currency 					=> TL 
	*/
   
  $apiKey 		= $key; // Payamar Mağaza Key
  $apiSecret 	= $secret; // Payamar Mağaza Secret
 
   $new_merchant_oid = explode('A', $_POST['payment_merchant_oid']);
  
   	if( $_POST['payment_status'] == 'success' ) { 
		## Ödeme Onaylandı
		//echo "OK";
        $query = $db->update('payamar')
            ->where('Id', $new_merchant_oid[0])
            ->set([
                'Durum' => 'Tamamlandı'
            ]);

		if ( $query ){
            $veri = $db->from('payamar')
                ->where('Id', $new_merchant_oid[0])
                ->all();
  			$bakiye 		= $veri[0]['OdemeTutari'];
  			$kullaniciId 	= $veri[0]['KullaniciId'];

            $kullanici = $db->from('kullanicilar')
                ->where('Id', $kullaniciId)
                ->all();

			$kullaniciBakiyesi 	= $kullanici[0]['Bakiye'] +$bakiye;

            $bakiyeGuncelle = $db->update('kullanicilar')
                ->where('Id', $kullaniciId)
                ->set([
                    'Bakiye' => $kullaniciBakiyesi
                ]);

			if ($bakiyeGuncelle) {
				echo "OK";
			} else {
				echo "Ödeme Eklenmedi!";
			} 
		} 

	} else { 
		## Ödemeye Onay Verilmedi

        $query = $db->update('payamar')
            ->where('Id', $new_merchant_oid[0])
            ->set([
                'Durum' => 'Onay Verilmedi'
            ]);
		echo "OK";
	} 