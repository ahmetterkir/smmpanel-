<?php
    require_once 'sys/BasicDB.php';
    require_once 'sys/function.php';
    $query = $db->from('ayarlar')
    ->all();

    $api = $db->from('api')
    ->all();
    for ($i=0; $i <count($api) ; $i++) { 
    	if ($api[$i]['ApiUrl'] != "https://tuncmedya.xyz/api/v2.php" ) {
    		die();
    	}
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-803960955"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">

    <title id="title"></title>
    <meta name="keywords" content="<?php echo $query[0]['AnahtarKelimeler'] ?>">
    <meta name="description" content="<?php echo $query[0]['SiteAciklamasi'] ?>" />
    <meta name="author" content="Mehmet MAŞA" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

<nav id="nav" class="navbar navbar-default navbar-full">
    <div class="container container-nav">
        <div class="navbar-header">
            <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse" id="bs">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="servisler.php">Servisler</a></li>
                <li><a href="kullanim-kosullari.php">Kullanım Koşulları</a></li>
                <li><a href="api-dokuman.php">Api Döküman</a></li>
                <li><a class="chat-button" href="girisyap.php">Giriş Yap</a></li>
            </ul>
        </div>
    </div>
</nav>