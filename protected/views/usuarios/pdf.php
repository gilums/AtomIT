<?php 
$contador=count($model);
    $html.='

    <table class="table" align="center"><tr>
    <td align="center"><b>LISTADO DE CONTRATOS</b></td>
    </tr></table>
    Total Resultados: '.$contador.'
        <table class="table">
            <tr class="principal">
                <td class="principal" width="7%">&nbsp;N° Usuario</td>
                <td class="principal" width="7%">&nbsp;N° Nick</td>
                <td class="principal" width="19%">&nbsp;Pass</td>
                <td class="principal" width="10%">&nbsp;Fecha creacion</td>
            </tr>';
         $i=0;
         $val=count($model);
         
         while($i<$val){
    $html.='
            <tr class="odd">
                <td class="odd" width="7%">&nbsp;'.$model[$i]["id"].'</td>
                <td class="odd" width="7%">&nbsp;'.$model[$i]["nick"].'</td>
                <td class="odd" width="19%">&nbsp;'.$model[$i]["pass"].'</td>
                <td class="odd" width="10%">&nbsp;'.$model[$i]["fecha_creacion"].'</td>
            ';
    $html.='</tr>'; $i++;
                        }
    $html.='</table>';

$mpdf = new mPDF('utf-8','LETTER','','',15,15,25,12,5,7);
/*$mpdf->SetHeader(Yii::app()->name);
$mpdf->SetFooter('Pie de página');
$mpdf->SetWatermarkImage("/images/logo.jpg");
$mpdf ->showWatermarkImage = true;*/
$mpdf->WriteHTML($html);
$mpdf->Output('Usuarios.pdf','D');
exit;
?>