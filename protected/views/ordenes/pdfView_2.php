<?php 
    $html2='<link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/bootstrap.css" />
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

$html='
<style>
  .logo-emp{
    width: 250px;
}

#tabla2{
    font-family: "Dosis", sans-serif;
/*    border: 1px solid red;*/
    width: 100%;
}
#img-template{
/*    border: 1px solid green;*/
    width: 20%;
}
#tabla3 tr td{
font-family: "Dosis", sans-serif;
    padding-top: 5px;
    padding-bottom: 5px; 

}
#datos-empresa{
font-family: "Dosis", sans-serif;
    width: 40%;
/*    border: 1px solid black;*/
}
#nro_orden{
    float: right;
    width: 40%;
}
#tabla1{
font-family: "Dosis", sans-serif;
    text-align: center;

    width: 100%;
}
#tabla4{
font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla4, #tabla4 th, #tabla4 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla4 th, #tabla4 td {
    padding: 10px;
    text-align: center;    
}

#datos-cliente-equipo{
font-family: "Dosis", sans-serif;
    padding-top:10px;
    width: 100%;
}
#contenedor-datos-cliente{
font-family: "Dosis", sans-serif;
    width: 50%;
    padding-right: 10px;
}
#contenedor-datos-equipo{
    width: 50%;
}

#tabla5{
font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla5, #tabla5 th, #tabla5 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla5 th, #tabla5 td {
    padding: 10px;
    text-align: left;    
}

#tabla6{
font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla6, #tabla6 th, #tabla6 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla6 th, #tabla6 td {
    padding: 10px;
    text-align: left;    
}
#tabla4 th,#tabla5 th,#tabla6 th{
 background-color: #f5f5f5;
}

#datos-falla-comentarios{
    width: 100%;
    padding-top: 10px;
}
#contenedor-datos-falla{
    width: 50%;
    padding-right: 10px;
}
#contenedor-datos-comentario{
    width: 50%;
}

#tabla7{
    font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla7, #tabla7 th, #tabla7 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla7 th, #tabla7 td {
    padding: 10px;
    text-align: left;    
}

#tabla8{
    font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla8, #tabla8 th, #tabla8 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla8 th, #tabla8 td {
    padding: 10px;
    text-align: left;    
}
#tabla7 th,#tabla8 th{
 background-color: #f5f5f5;
}


#datos-resolucion{
    width: 100%;
    padding-top: 10px;
}
#contenedor-datos-resolucion{
    width: 100%;
    padding-right: 10px;
}

#tabla9{
    font-family: "Dosis", sans-serif;
    width: 100%;
}

#tabla9, #tabla9 th, #tabla9 td {
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
#tabla9 th, #tabla9 td {
    padding: 10px;
    text-align: left;    
}

#tabla9 th{
    font-family: "Dosis", sans-serif;
    background-color: #f5f5f5;
}
</style>
    <table id="tabla2">
        <tr>
            <td id="img-template">
                <img class="logo-emp" src="'.Yii::app()->request->baseUrl.'/img/darsol.png"/>
            </td>
            <td id="datos-empresa">
                <table id="tabla3">
                    <tr>
                        <td>Direccion: Prueba 1234</td>          
                    </tr>
                    <tr>
                         <td>Tel: 099888333</td>
                    </tr>   
                    <tr>   
                        <td>E-Mail: dalfaro@outlook.com</td>
                    </tr>     
                    <tr>    
                        <td>Web: www.dar.com</td>
                    </tr>  

                </table>
            </td>
            <td id="nro_orden">
                <table id="tabla1">
                    <tr>
                        <td style="font-size:40px;">Service Order</td>          
                    </tr>
                    
                         <table id="tabla4">
                            <tr>
                                <th style="border-bottom: 1px solid #dddddd;">N° Orden</th>          
                                <th style="border-bottom: 1px solid #dddddd;">Fecha</th>          
                            </tr>
                            <tr>
                                 <td>'.$model->id.'</td>
                                 <td>'.date("d/m/Y").'</td>
                            </tr>   
                         </table>
                    
                 </table>
            </td>           
        </tr>
      </table>
      <table id="datos-cliente-equipo">
          <tr >
              <td id="contenedor-datos-cliente">
                 <table id="tabla5">
                    <tr>
                        <th colspan="2" style="border-bottom: 1px solid #dddddd;">Datos del cliente</th>                  
                    </tr>
                    <tr>
                         <td>Cuenta</td>
                         <td>'.$model->clientes->nombre.'</td>
                    </tr>
                    <tr>
                         <td>Dirección</td>
                         <td>'.$model->clientes->direccion.'</td>
                    </tr>   
                    <tr>
                         <td>Teléfono</td>
                         <td>'.$model->clientes->telefono.'</td>
                    </tr>   
                    <tr>
                         <td>Contacto</td>
                         <td></td>
                    </tr>    
                 </table> 
              </td>
              <td id="contenedor-datos-equipo">
                  <table id="tabla6">
                    <tr>
                        <th colspan="2" style="border-bottom: 1px solid #dddddd;">Datos del equipo</th>                
                    </tr>
                    <tr>
                         <td>Tipo</td>
                         <td>'.$model->equipo->tipo.'</td>
                    </tr>
                    <tr>
                         <td>Marca</td>
                         <td>'.$model->equipo->marcas->nombre.'</td>
                    </tr>   
                    <tr>
                         <td>Modelo</td>
                         <td>'.$model->equipo->modelo.'</td>
                    </tr>   
                    <tr>
                         <td>N° Serie</td>
                         <td>'.$model->equipo->nro_serie.'</td>
                    </tr>     
                 </table>
              </td>
          </tr>
      </table>
      
      <table id="datos-resolucion">
          <tr >
              <td id="contenedor-datos-resolucion">
                 <table id="tabla9">
                    <tr>
                        <th style="border-bottom: 1px solid #dddddd;">Falla</th>                  
                    </tr>
                    <tr>
                         <td>'.$model->falla.'</td>
                    </tr> 
                 </table> 
              </td>
          </tr>
      </table>
      <table id="datos-resolucion">
          <tr >
              <td id="contenedor-datos-resolucion">
                 <table id="tabla9">
                    <tr>
                        <th style="border-bottom: 1px solid #dddddd;">Comentarios</th>                  
                    </tr>
                    <tr>
                         <td>'.$model->nota.'</td>
                    </tr> 
                 </table> 
              </td>
          </tr>
      </table>
      <table id="datos-resolucion">
          <tr >
              <td id="contenedor-datos-resolucion">
                 <table id="tabla9">
                    <tr>
                        <th style="border-bottom: 1px solid #dddddd;">Resolución</th>                  
                    </tr>
                    <tr>
                         <td>'.$model->solucion.'</td>
                    </tr> 
                 </table> 
              </td>
          </tr>
      </table>';

$pdf = new mPDF('utf-8');
//$pdf = new HTML2PDF();
/*$mpdf->SetHeader(Yii::app()->name);
$mpdf->SetFooter('Pie de página');
$mpdf->SetWatermarkImage("/images/logo.jpg");
$mpdf ->showWatermarkImage = true;*/
$pdf->WriteHTML($html);
//$pdf->pdf->IncludeJS('print(TRUE)');
//$pdf->pdf->IncludeJS('window.open(this.href, "_blank", "width=300,height=400"); return false;');
$pdf->Output('Orden.pdf','I');
exit;
?>