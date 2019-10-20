<?php
    require_once 'sys/BasicDB.php';
    require_once 'sys/function.php';
?>
<div id="footer" class="container-fluid">
        <div class="container">
            <div class="row">
                <p   style="color: white;"> <?php echo $query[0]['FooterAlani'] ?></p>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/paper-full.min.js"></script>
    <script type="text/paperscript" src="assets/js/metaball.js" data-paper-canvas="infobg"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

<script>
    $(document).ready(function () {
        $.post('sys/function.php', {
                action: "load-home-page"
            },
            function (obj) {
                rs = JSON.parse(obj);
                $("#title").text(rs.data.ayarlar[0].SiteBasligi);
                $("#ApiUrl").text(rs.data.ayarlar[0].ApiUrl);
                $("#birinciBaslik").text(rs.data.anasayfaayar[0].birinciBaslik);
                $("#ikinciBaslik").text(rs.data.anasayfaayar[0].ikinciBaslik);
                $("#nelerYapiyoruz").text(rs.data.anasayfaayar[0].nelerYapiyoruz);
                $("#instagram").text(rs.data.anasayfaayar[0].instagram);
                $("#twitter").text(rs.data.anasayfaayar[0].twitter);
                $("#facebook").text(rs.data.anasayfaayar[0].facebook);
                $("#Youtube").text(rs.data.anasayfaayar[0].Youtube);
                $("#musteriMemnuniyeti").text(rs.data.anasayfaayar[0].musteriMemnuniyeti);
                $("#guvenliOdeme").text(rs.data.anasayfaayar[0].guvenliOdeme);
                $("#destek").text(rs.data.anasayfaayar[0].destek);
                $("#esnekHarcama").text(rs.data.anasayfaayar[0].esnekHarcama);
                $("#akilliFiyatlandirma").text(rs.data.anasayfaayar[0].akilliFiyatlandirma);
                $("#apiDestegi").text(rs.data.anasayfaayar[0].apiDestegi);
            });
    });
</script>