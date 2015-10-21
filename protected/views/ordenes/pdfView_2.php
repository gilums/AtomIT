<?php 
    $html='<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf-orden.css" />

<div class="col-lg-12">
    <div class="col-lg-6 borde">
        
        <h5>Direccion: Prueba 1234</h5>
        <h5>Tel: 099888333</h5>
        <h5>E-Mail: dalfaro@outlook.com</h5>
        <h5>Web: www.dar.com</h5>
    </div>
    <div class="col-md-3 col-md-offset-3 text-center borde">
        <h1>Service Order</h1>
        <!--<h2>SO-1000</h2>-->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>N° Orden</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1000</td>
                        <td>Mark</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-lg-12 contenedor-datos-equipo">
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Datos del equipo</div>
          <div class="panel-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>'.$model->id.'</td>
                        <td>'.$model->clientes->nombre.'</td>
                        <td>'.$model->clientes->direccion.'</td>
                        <td>'.$model->equipo->nro_serie.'</td>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
    <div class="col-lg-6">

    </div>
</div>';

/*$mpdf = new mPDF('utf-8','LETTER','','',15,15,25,12,5,7);*/
$pdf = new HTML2PDF();
/*$mpdf->SetHeader(Yii::app()->name);
$mpdf->SetFooter('Pie de página');
$mpdf->SetWatermarkImage("/images/logo.jpg");
$mpdf ->showWatermarkImage = true;*/
$pdf->WriteHTML($html);
$pdf->pdf->IncludeJS('print(TRUE)');
$pdf->Output('Orden.pdf','I');
exit;
?>