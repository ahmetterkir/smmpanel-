<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';
$query = $db->from('ayarlar')
    ->all();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-803960955"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">

    <title><?php echo $query[0]['SiteBasligi'] ?></title>
    <meta name="keywords" content="<?php echo $query[0]['AnahtarKelimeler'] ?>">
    <meta name="description" content="<?php echo $query[0]['SiteAciklamasi'] ?>" />
    <meta name="author" content="Mehmet MAŞA" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fullpage">
    <div id="form-section" class="container-fluid signup">

        <div class="menu-holder">
            <ul class="main-links">
                <li><a class="normal-link" href="girisyap.php">Zaten Üye Misin?</a></li>
                <li><a class="sign-button" href="girisyap.php">Giriş Yap <i class="hno hno-arrow-right"></i></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="form-holder">
                <div class="signin-signup-form">
                    <div class="form-items">
                        <div class="form-title"> Ücretsiz Kayıt Ol</div>
                        <form id="signinform" action="kayit.php" method="post">
                            <div class="form-text">
                                <input type="email" id="user_email" autocomplete="off" name="Email" placeholder="E-Posta Adresiniz" required>
                            </div>
                            <div class="form-text">
                                <input type="text" id="user_name" autocomplete="off" name="KullaniciAdi" placeholder="Kullanıcı Adı" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-text">
                                    <input type="password" id="user_pass" autocomplete="off" name="Sifre" placeholder="Şifreniz" required>
                                </div>
                                <div class="col-md-6 form-text">
                                    <input type="password" id="user_pass" autocomplete="off" name="SifreTekrar" placeholder="Şifre Tekrar" required>
                                </div>
                            </div>
                            <div class="form-text">
                                <input type="text" id="user_name" autocomplete="off" maxlength="10" name="Telefon" placeholder="(5XX-XXX-XX-XX)" required>
                            </div>
                            <div class="form-button">
                                <button id="submit" type="submit" onclick="myFunction()" class="btn btn-default">Kayıt Ol <i class="hno hno-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="info-slider-holder">
                <div class="info-holder">
                    <div class="img-text-slider">
                        <?php
                            $duyuru = $db->from('duyuru')
                                ->where('DuyuruBolumu', 'kayit')
                                ->all();
                            if (count($duyuru) > 0 ){
                                for ($i=0; $i <count($duyuru) ; $i++) {
                                    echo '
                                        <div style="color: #fff; font-size: 17px; ">
                                            <img src="assets/images/img-g1.png" alt="">
                                            '.$duyuru[$i]['DuyuruAciklama'].'
                                        </div>
                                    ';
                                }
                            }else{
                                echo '
                                        <div style="color: #fff; font-size: 17px; ">
                                            <img src="assets/images/img-g1.png" alt="">
                                            Henüz Duyuru Eklenmedi
                                        </div>
                                    ';
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
