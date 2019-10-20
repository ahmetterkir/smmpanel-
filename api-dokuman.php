<?php require_once "header.php"?>
<div id="page-head" class="container-fluid inner-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="page-title">Api Döküman</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-content" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
              <div class="well api well-float">
                <div class="center-big-content-block">
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                      <td class="width-40">Post Methodu</td>
                      <td>POST</td>
                    </tr>
                    <tr>
                      <td>API URL</td>
                      <td id="ApiUrl"></td>
                    </tr>
                    <tr>
                      <td>Api Formatı</td>
                      <td>JSON</td>
                    </tr>
                    </tbody>
                  </table>
                    <h4 class="m-t-md"><strong>Service Listesi</strong></h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                              <th class="width-40">Parametreler</th>
                              <th>Açıklama</th>
                            </tr>
                            </thead>
                        <tbody>
                            <tr>
                            <td>key</td>
                            <td>ApiKey</td>
                          </tr>
                                          <tr>
                            <td>action</td>
                            <td>Add, Status</td>
                          </tr>
                        </tbody>
                      </table>
                    <p><strong>Örnek Kod</strong></p>
        <pre>[
            {
                "service": 1,
                "name": "Takipçi",
                "type": "Default",
                "category": "İnstagram Takipçi",
                "rate": "0.90",
                "min": "100",
                "max": "8500"
            }
        ]
        </pre>
            <h4 class="m-t-md"><strong>Sipariş Ekleme</strong></h4>
                    <div id="type_0" style="">
                          <table class="table table-bordered">
                            <thead>
                            <tr>
                              <th class="width-40">Parametreler</th>
                              <th>Açıklama</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>key</td>
                                <td>Api Keyiniz</td>
                            </tr>
                            <tr>
                                <td>action</td>
                                <td>Yapmak istediğiniz işlem, örn: Add</td>
                            </tr>
                            <tr>
                                <td>service</td>
                                <td>Servis id</td>
                            </tr>
                            <tr>
                                <td>link</td>
                                <td>Sipariş url</td>
                            </tr>
                            <tr>
                                <td>quantity</td>
                                <td>Miktar</td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
                                  
                    <p><strong>Örnek Kod</strong></p>
                    <pre>
        {
            "orderID": 10
        }
                    </pre>
                <h4 class="m-t-md"><strong>Sipariş Durumu</strong></h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th class="width-40">Parametreler</th>
                          <th>Açıklama</th>
                        </tr>
                        </thead>
                        <tbody>
                                          <tr>
                            <td>key</td>
                            <td>Api Keyiniz</td>
                          </tr>
                                          <tr>
                            <td>action</td>
                            <td>Yapmak istediğiniz işlem, örn: Status</td>
                          </tr>
                                          <tr>
                            <td>order </td>
                            <td>Sipariş id</td>
                          </tr>
                        </tbody>
                      </table>
                        <a href="index/ornek.txt" class="btn btn-default m-t" target="_blank">Örnek PHP Kodu</a>
                </div>
              </div>
				</div>
			</div>
		</div>
	</div>
<?php require_once "footer.php"?>