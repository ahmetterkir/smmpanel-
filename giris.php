<?php
    require_once 'sys/BasicDB.php';
    require_once 'sys/function.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<?php
    if(isset($_POST["Kullanici"]) && isset($_POST["Sifre"]))
    {
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
		   
		$KullaniciAdi = addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["Kullanici"]));
		$Sifre = addslashes(str_replace(array_keys( $substitutions ), $substitutions, $_POST["Sifre"]));

        $query = $db->from('kullanicilar')
            ->where('KullaniciAdi', $KullaniciAdi)
            ->where('Sifre', $Sifre)
            ->where( 'Durum', 'Aktif')
            ->all();

        if ( count($query) && $query[0]['Durum'] == "Aktif" ) {
            if (count($query) > 0) {
                $_SESSION['oturum'] = true;
                $_SESSION['Kullanici'] = $KullaniciAdi;
                $_SESSION['Sifre'] = $Sifre;
                $_SESSION['Id'] = $query[0]['Id'];
                include "girisyap.php";
                Yonlendir("index/index.php");

            } else {
                echo '<script type = "text/javascript"> swal("Hata!", "Bilgileri Yanlış Girdiniz.", "info")</script>';
                Yonlendir("girisyap.php", 2);
                include("girisyap.php");
            }
        } else {
            echo '<script type = "text/javascript"> swal("Bilgi!", "Kullanıcı Bulunamadı Veya Pasif Durumda.", "info")</script>';
            Yonlendir("girisyap.php", 2);
            include("girisyap.php");
        }


    }
ob_end_flush();
?>
</body>
</html>