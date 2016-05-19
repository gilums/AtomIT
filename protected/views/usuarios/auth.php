<div class="contenedor-titulo">
    <h1>Autorizaciones</h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $model Usuarios */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index','Autorizaciones'), 
            )
        );

        ?>
    </div>
    <div class="text-right">
        <a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/createrole'); ?>" class="btn btn-default btn-link-d">Role</a></div>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Autorizaciones</span> </div>

    <div class="panel-body admin">
            <div class="table-responsive ">
              <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $i=1;
                        foreach (Yii::app()->authManager->getAuthItems() as $data):
                    ?>      
                    <tr>
                        <td><?php echo $i ?> </td>
                        <td><?php echo $data->name; ?> </td>
                        <td>
                            <?php if($data->type==0)echo '<span class="label label-success">Operacion</span>'; ?>
                            <?php if($data->type==1)echo '<span class="label label-info">Tarea</span>'; ?>
                            <?php if($data->type==2)echo '<span class="label label-warning">Role</span>'; ?>
                        </td>
                        <td><?php echo $data->description; ?></td>
                        <td>
                            
                        </td>
                    </tr>
                    <?php 
                        $i++;
                        endforeach; 
                    ?>
                </tbody>
              </table>
            </div>

        </div>
    </div>
</div>