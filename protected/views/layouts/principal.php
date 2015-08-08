<?php /* @var $this Controller */ ?>
<!DOCTYPE html">
<html lang="es">
<head>

    <!-- METADATOS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="language" content="es" />
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/atomit.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php if(!Yii::app()->user->isGuest){ ?>
    <div id="contenedor_web">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">AtomIT</a>
                </div>
                
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                        </ul>
                    </li>
                    <?php if(Yii::app()->user->isGuest){ ?>
                    <li><a href="<?php echo Yii::app()->createUrl('/site/login'); ?>">Iniciar Sesion</a></li>            
                    <?php }
                    else{ 
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo Yii::app()->user->name ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('/usuarios/view',array('id'=>Yii::app()->user->id)); ?>"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('/usuarios/update',array('id'=>Yii::app()->user->id)); ?>"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesion</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            
            
                <!-- MENU VERTICAL -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <?php if(!Yii::app()->user->isGuest && Yii::app()->user->name=="admin"){ ?>
                        <li class="">
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-male"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo2" class="collapse">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/usuarios/index'); ?>">Admin</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/usuarios/create'); ?>">Crear</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/clientes/admin'); ?>"><i class="fa fa-fw fa-group"></i> Clientes</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-folder-open-o"></i> Ordenes <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo1" class="collapse">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/ordenes/create'); ?>">Crear</a>
                                </li>
                            </ul>
                        </li>
                        <?php if(!Yii::app()->user->isGuest && Yii::app()->user->name=="admin"){ ?>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-wrench"></i> Mantenimiento <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/barrio/index'); ?>">Barrios</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/cuidad/index'); ?>">Cuidades</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/departamento/index'); ?>">Departamentos</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/marcas/index'); ?>">Marcas</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/accesorios/index'); ?>">Accesorios</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/contactos/admin'); ?>">Contactos</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="contenedor_web_contenido">
                <div class="container-fluid">
                    <?php echo $content; ?>
                </div>
                <!-- /.container-fluid -->                
            </div>
            <!-- /#contenedor_web_contenido -->
        

    </div>
    <!-- /#contenedor_web -->
  <?php }else{ ?>
    <div class="login">
        <div class="login_container">
            <?php echo $content; ?>
        </div>
    </div>    
  <?php } ?>

 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/atomit.js',CClientScript::POS_END) ?>

    

</body>
</html>



