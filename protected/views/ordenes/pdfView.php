<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Ordenes' => 'index',$model->id), 
    )
);

?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pdf-orden.css" />
<div class="col-lg-12">
    <div class="col-lg-6">
        <div class="col-lg-5">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/darsol.png" class="img-responsive logo-pdf" alt=""></div>
        <div class="col-lg-5">
        <h4>Direccion: Prueba 1234</h4>
        <h4>Tel: 099888333</h4>
        <h4>E-Mail: dalfaro@outlook.com</h4>
        <h4>Web: www.dar.com</h4>
        </div>
    </div>
    <div class="col-md-3 col-md-offset-3 text-center">
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
                        <td><?php echo $model->id; ?></td>
                        <td><?php echo date("d/m/Y"); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Datos del cliente</div>
          
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="primera_tabla">Cuenta</td>
                            <td>
                                <?php 

                                    if(!empty($model->clientes->razon_social)){
                                        echo $model->clientes->razon_social;
                                    }else{
                                        echo $model->clientes->nombre;
                                    } 

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="primera_tabla">Dirección</td>
                            <td><?php echo $model->clientes->direccion; ?></td>
                        </tr>
                        <tr>
                            <td class="primera_tabla">Teléfono</td>
                            <td><?php echo $model->clientes->telefono; ?></td>
                        </tr>
                       <tr>
                            <td class="primera_tabla">Contacto</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Datos del equipo</div>
          
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td class="primera_tabla">Tipo</td>
                            <td><?php echo $model->equipo->tipo; ?></td>
                        </tr>
                        <tr>
                            <td class="primera_tabla">Marca</td>
                            <td><?php echo $model->equipo->marcas->nombre; ?></td>
                        </tr>
                        <tr>
                            <td class="primera_tabla">Modelo</td>
                            <td><?php echo $model->equipo->modelo; ?></td>
                        </tr>
                        <tr>
                            <td class="primera_tabla">N° Serie</td>
                            <td><?php echo $model->equipo->nro_serie; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
       
        </div>
    </div>

<div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Falla</div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><?php echo $model->falla; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Comentarios</div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                        <?php 
                            if(!empty($model->nota)){
                                echo $model->nota;
                            }else{
                                echo 'No aplica';
                            } 

                       ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Resolucion</div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                        <?php 
                            if(!empty($model->solucion)){
                                echo $model->solucion;
                            }else{
                                echo 'Sin completar';
                            } 

                         ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
</div>








