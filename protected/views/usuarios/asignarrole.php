<div class="contenedor-titulo-c">
    <h1>Usuarios <small>/<?php echo $model->nick; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $model Usuarios */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index',$model->nick), 
            )
        );


        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <div class="col-md-6">
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                	<?php echo CHtml::image(Yii::app()->createUrl('usuarios/loadImage', array('id'=>$model->id)),'',array('class'=>'img-responsive')); ?>
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4><?php echo $model->nombre.' '.$model->apellido ?>
                    <h4><small>
    	                <cite title=""><?php echo $model->direccion ?> <i class="glyphicon glyphicon-map-marker"></i></cite>
                    </small></h4>
                    <p><i class="fa fa-envelope"></i><?php echo $model->email ?></p>
                    
                    <p><i class="glyphicon glyphicon-phone"></i><?php echo $model->celular ?></p>
                    
                    <p><i class="fa fa-user"></i><?php echo $model->nick ?></p>

                    <p><i class="glyphicon glyphicon-gift"></i><?php echo $model->fecha_creacion ?></p>
                   
                </div>
            </div>
        </div>
    </div>		
    <div class="col-md-6">
    	<div class="panel panel-default">
    		<div class="panel-heading text-left"><span class="color-txt">Roles</span></div>
    		<div class="panel-body admin">
    			<?php $this->renderPartial("_asign",array('model'=>$model)); ?>
    		</div>
    	</div>
    </div>
</div>