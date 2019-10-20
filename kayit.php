<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';
?>
<html lang="tr">
<head>
<meta charset="UTF-8">

</head>
<body>
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
date_default_timezone_set('Europe/Istanbul');
$Tarih = date("Y-m-d H:i:s");
    
    if (isset($_POST['KullaniciAdi']) || isset($_POST['Email']) || isset($_POST['Sifre']) || isset($_POST['SifreTekrar']) || isset($_POST['Telefon'])){

           $substitutions = array( 
                '&'  => '', 
                ';'  => '', 
                '| ' => '', 
                '-'  => '', 
                '$'  => '', 
                '('  => '', 
                ')'  => '', 
                '`'  => '', 
                '||' => '', 
            ); 


        $KullaniciAdi = strip_tags(addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["KullaniciAdi"])));
        $Email = strip_tags(addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["Email"])));
        $Sifre = strip_tags(addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["Sifre"])));
        $SifreTekrar = strip_tags(addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["SifreTekrar"])));
        $Telefon = strip_tags(addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["Telefon"])));
        $apiKey = strip_tags($Sifre) . uniqid();
        $ApiKey = strtoupper(substr(sha1(md5($apiKey)), -25));
        $Bakiye = 0;

        $KullaniciSorgula = $db->from('kullanicilar')
            ->where('KullaniciAdi', $KullaniciAdi)
            ->all();

        $TelefonSorgula = $db->from('kullanicilar')
            ->where('Telefon', $Telefon)
            ->all();

        if (empty($KullaniciAdi) || empty($Email) || empty($Sifre) || empty($SifreTekrar) || empty($Telefon)) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Boş alan bırakmayınız.", "info")</script>';
            Yonlendir("kayitol.php",2);
        } elseif ( $Sifre != $SifreTekrar) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Şifreler uyuşmuyor lütfen tekrar deneyiniz.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }
        elseif ( strlen($KullaniciAdi) <= 4 ) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Kullanıcı adınız en az 5 karakter olmalıdır.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }
        elseif ( strlen($Sifre) <= 6) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Şifreniz en az 7 karakter olmalıdır.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }
            elseif (count($TelefonSorgula) > 0 ) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Telefon numarası zaten kullanılıyor. Lütfen Giriş yapınız.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }elseif (count($KullaniciSorgula) > 0) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Kullanıcı adı veye mail kullanılıyor.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }elseif (is_numeric($Telefon) == 0) {
            include "kayitol.php";
            echo '<script type = "text/javascript">swal("Bilgi!", "Telefon bölümüne sadece sayı yazınız.", "info")</script>';
            Yonlendir("kayitol.php",2);
        }else{  

            $Durum = "Aktif";

            $query = $db->insert('kullanicilar')
                ->set(array(
                    "KullaniciAdi" => $KullaniciAdi,
                    "Sifre" => $Sifre,
                    "Email" => $Email,
                    "Bakiye" => $Bakiye,
                    "Telefon" => $Telefon,
                    "ApiKey" => $ApiKey,
                    "Durum" => $Durum
,                ));

            if ( $query ){
                $KullaniciId = $db->lastInsertId();
                $_SESSION['oturum']=true;
                $_SESSION['Kullanici']=$KullaniciAdi;
                $_SESSION['Sifre']=$Sifre;
                $_SESSION['Id'] = $KullaniciId;
                include "kayitol.php";
                Yonlendir("index/index.php");
            }else{
                include "kayitol.php";
                echo '<script type = "text/javascript"> swal("Bilgi", "Kayıt İşlemi Yapılamadı!", "error"); </script>';
                Yonlendir("kayitol.php", 2);
            }






}   
}
?>
</body>
</html>