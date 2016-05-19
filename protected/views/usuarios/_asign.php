
<div class="table-responsive">
    <table class="table table-condensed table-role-user">
        <tbody>
        <?php foreach (Yii::app()->authManager->getAuthItems() as $data):?>
            <?php $enabled=Yii::app()->authManager->checkAccess($data->name,$model->id); ?>
            <tr>
                
                <td><?php echo $data->name; ?> </td>
                <!-- <td>
                    <?php #if($data->type==0)echo '<span class="label label-success center-block">Operacion</span>'; ?>
                    <?php #if($data->type==1)echo '<span class="label label-info center-block">Tarea</span>'; ?>
                    <?php #if($data->type==2)echo '<span class="label label-warning center-block">Role</span>'; ?>
                </td> -->
                <td>
                    <?php echo $data->description; ?>
                </td>
                <!--<td ><?php #echo $enabled?"<span class='label label-success center-block'>Activo</span>":"<span class='label label-info center-block'>Inactivo</span>"; ?></td>-->
                <td>
                    <?php echo CHtml::link($enabled?"Inactivar":"Activar",array("usuarios/asignarrol","id"=>$model->id,"item"=>$data->name),array("class"=>$enabled?"btn btn-primary":"btn btn-default")); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <!--<li>
    
        <h4><?php #echo $data->name; ?> 
            <small>(
                <?php #if($data->type==0)echo "Operacion"; ?>
                <?php #if($data->type==1)echo "Tarea"; ?>
                <?php #if($data->type==2)echo "Role"; ?>
                - <?php #echo $data->description; ?>)
            </small>
            
       </h4>
       <?php #echo CHtml::link($enabled?"Inactivar":"Activar",array("usuarios/asignarrol","id"=>$model->id,"item"=>$data->name),array("class"=>$enabled?"btn btn-primary":"btn btn-default")); ?>
       <p>
            <?php #echo $enabled?"<span class='label label-success'>Activo</span>":"<span class='label label-info'>Inactivo</span>"; ?>
       </p>
       <hr>
   </li>-->