    <?php require_once "header.php"?>
	<div id="top-content" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div id="main-slider">
						<div class="slide info-slide1" title="Hoşgeldiniz!">
							<div class="image-holder"><img src="assets/images/main-slide-img1.png" alt="" /></div>
							<div class="text-holder txt" id="birinciBaslik"></div>
							<div class="button-holder"><a href="girisyap.php" class="blue-button">Giriş Yap</a></div>
						</div>
						
						<div class="slide info-slide2" title="Ücretsiz Kayıt Ol">
							<div class="image-holder"><img src="assets/images/main-slide-img2.png" alt="" /></div>
							<div class="text-holder txt" id="ikinciBaslik"></div>
							<div class="button-holder"><a href="kayit.php" class="blue-button">Kayıt Ol</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="info" class="container-fluid">
		<canvas id="infobg" data-paper-resize="true"></canvas>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row-title">Sizin İçin<br>
						Neler Yapıyoruz?
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="info-text" id="nelerYapiyoruz"></div>
				</div>
			</div>
		</div>
	</div>
	<div id="apps" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row-title" title="Sosyal Medya?"> Hangi Sosyal Medya Hizmetlerini Barındırıyoruz?</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="apps-holder">
						<div class="apps-links-holder">
							<div class="app-icon-holder app-icon-holder1 opened" data-id="1">
								<div class="app-icon"><img src="assets/images/icon/Instagram.png" alt="instagram"></div>
								<div class="app-title" >İnstagram</div>
							</div>
							<div class="app-icon-holder app-icon-holder2" data-id="2">
								<div class="app-icon"><img src="assets/images/icon/twitter.png" alt="twitter"></div>
								<div class="app-title" >Twitter</div>
							</div>
							<div class="app-icon-holder app-icon-holder3" data-id="3">
								<div class="app-icon"><img src="assets/images/icon/Facebook.png" alt="facebook"></div>
								<div class="app-title" >Facebook</div>
							</div>
							<div class="app-icon-holder app-icon-holder4" data-id="4">
								<div class="app-icon"><img src="assets/images/icon/youtube.png" alt="youtube"></div>
								<div class="app-title" >Youtube</div>
							</div>
						</div>
						<div class="apps-details-holder">
							<div class="app-details">
								<div class="app-details1 show-details">
									<div class="app-title">İnstagram</div>
									<div class="app-text" id="instagram"></div>
								</div>
								<div class="app-details2">
									<div class="app-title">Twitter</div>
									<div class="app-text" id="twitter"></div>
								</div>
								<div class="app-details3">
									<div class="app-title">Facebook</div>
									<div class="app-text" id="facebook"></div>
								</div>
								<div class="app-details4">
									<div class="app-title">Youtube</div>
									<div class="app-text" id="Youtube"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="features" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<div class="mfeature-box">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/clouds-light.png" alt="" /></div>
							<i class="fas fa-star"></i>
						</div>
						<div class="mfeature-title">%100 Müşteri Memnuniyeti</div>
						<div class="mfeature-details" id="musteriMemnuniyeti"> </div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="mfeature-box active">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/clouds-light.png" alt="" /></div>
							<i class="fas fa-credit-card"></i>
						</div>
						<div class="mfeature-title">3D Güvenli Ödeme</div>
						<div class="mfeature-details" id="guvenliOdeme"></div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="mfeature-box">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/clouds-light.png" alt="" /></div>
							<i class="fas fa-comments"></i>
						</div>
						<div class="mfeature-title">7/24 Destek</div>
						<div class="mfeature-details" id="destek"></div>
					</div>
				</div>
			</div> 
		</div>
	</div>
	<div id="more-features" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row-title" title="Kolaylıklar">Sistem Kolaylıkları</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="mfeature-box">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/cloud-light.png" alt="" /></div>
							<div class="icon-img"><img src="assets/images/feature4.png" alt="" /></div>
						</div>
						<div class="mfeature-title">Esnek Harcama</div>
						<div class="mfeature-details" id="esnekHarcama"></div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="mfeature-box">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/cloud-light.png" alt="" /></div>
							<div class="icon-img"><img src="assets/images/feature3.png" alt="" /></div>
						</div>
						<div class="mfeature-title">Akıllı Fiyatlandırma</div>
						<div class="mfeature-details" id="akilliFiyatlandirma"></div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="mfeature-box">
						<div class="mfeature-icon">
							<div class="icon-bg"><img src="assets/images/cloud-light.png" alt="" /></div>
							<div class="icon-img"><img src="assets/images/feature5.png" alt="" /></div>
						</div>
						<div class="mfeature-title">Api Desteği</div>
						<div class="mfeature-details" id="apiDestegi"> </div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php require_once "footer.php" ?>