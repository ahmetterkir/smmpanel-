<?php
require_once 'sys/BasicDB.php';
require_once 'sys/function.php';
require_once "header.php";
?>

	<div id="page-head" class="container-fluid inner-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="page-title">Servisler</div>
				</div>
			</div>
		</div>
	</div>
	<div id="page-content" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="content-holder">
						<table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr >
                                            <th style="text-align: center">Servis ID</th>
                                            <th style="text-align: center">Servis Adı</th>
                                            <th style="text-align: center">Minimum </th>
                                            <th style="text-align: center">Maximum </th>
                                            <th style="text-align: center">Fiyat</th>
                                            <th style="text-align: center">Açıklama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $servisler = $db->from('servisler')
                                        ->orderby('Fiyat', 'ASC')
                                        ->where('Durum', 'Aktif')
                                        ->all();

                                    $kategori = $db->from('kategori')
                                        ->where('Durum', 'Aktif')
                                        ->orderby('KategoriNo', 'ASC')
                                        ->all();
                                    if(count($kategori) > 0 ){
                                        for ($i = 0; $i < count($kategori); $i++) {
                                            echo '
	                                        <tr>
	                                        	<td colspan="6" style="text-align: center"><strong>'.$kategori[$i]['KategoriAdi'].'</strong></td>
	                                        </tr>
	                                       ';
                                            for($j = 0; $j<count($servisler); $j++){
                                                $KategoriAdi = $servisler[$j]['KategoriAdi'];

                                                if ($kategori[$i]['KategoriAdi'] == $KategoriAdi){
                                                    $ServisId = $servisler[$j]['Id'];
                                                    $Fiyat = number_format($servisler[$j]['Fiyat'],2);
                                                    if (isset($KullaniciId)){
                                                        $ozelFiyat = $db->from('ozelfiyat')
                                                            ->where('KullaniciId', $KullaniciId)
                                                            ->where('ServisId', $ServisId)
                                                            ->all();
                                                        if ( count($ozelFiyat) > 0){
                                                            $Fiyat = number_format($ozelFiyat[0]['Fiyat'],2);
                                                        }
                                                    }

                                                    echo '
                                                <tr>
                                                    <td style="text-align: center;">'.$servisler[$j]['Id'].'</td>
                                                    <td style="text-align: center;">'.$servisler[$j]['ServisAdi'].'</td>
                                                    <td style="text-align: center;">'.$servisler[$j]['Minimum'].'</td>
                                                    <td style="text-align: center;">'.$servisler[$j]['Maximum'].'</td>
                                                    <td style="text-align: center;">'.$Fiyat.'<i class="fa fa-try"></td>
                                                    <td style="text-align: center; word-wrap: break-word; width:250px; " >'.$servisler[$j]['Aciklama'].'</td>
                                                </tr>';
                                                }
                                            }
                                        }
                                    }else{
                                        echo '
	                                       <tr>
	                                        	<th><th>Tabloda Ekli Veri Yok.</th></th>
	                                       </tr>
	                                       ';
                                    }

                                    ?>
                                    </tbody>
                                </table>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php require_once "footer.php"; ?>
