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
    
    <link rel="icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/img/favicon.png">

	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/atomit.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body class="nav-md">
 
  <?php if(!Yii::app()->user->isGuest){ ?>

    <div class="container contenedor-total body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="site_title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo6.png"><span>AtomIt</span></a>
                    </div>
                    <div class="clearfix"></div>


                    <div class="profile">

                        <div class="profile_pic">
                            <?php echo CHtml::image(Yii::app()->controller->createUrl('usuarios/loadImage', array('id'=>Yii::app()->user->id)),'',array('class'=>'profile_pic_img center-block img-circle img-responsive')); ?>
                        </div>
                        <div class="profile_info col-md-12 text-center">
                            <span>Bienvenido</span>
                            <h2><?php echo Yii::app()->user->name ?></h2>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>"><i class="fa fa-home"></i> Home </a>
                                </li>
                                <?php if(!Yii::app()->user->isGuest && Yii::app()->user->name=="admin"){ ?>
                                <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo Yii::app()->createUrl('/usuarios/index'); ?>">Lista</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/usuarios/create'); ?>">Nuevo</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/usuarios/auth'); ?>">Autorizaciones</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/clientes/index'); ?>"><i class="fa fa-user-secret"></i> Clientes </a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('/equipos/index'); ?>"><i class="fa fa-laptop"></i> Equipos </a>
                                </li>
                                <li>
                                    <a><i class="fa fa-folder-open "></i> Ordenes <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo Yii::app()->createUrl('/ordenes/create'); ?>">Crear</a>
                                        </li>
                                    </ul>
                                </li>
                                <?php if(!Yii::app()->user->isGuest && Yii::app()->user->name=="admin"){ ?>
                                <li><a><i class="fa fa-cogs"></i> Componentes <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo Yii::app()->createUrl('/barrio/index'); ?>">Barrios</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/ciudad/index'); ?>">Cuidades</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/departamento/index'); ?>">Departamentos</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/marcas/index'); ?>">Marcas</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/accesorios/index'); ?>">Accesorios</a>
                                        </li>
                                        <li><a href="<?php echo Yii::app()->createUrl('/contactos/index'); ?>">Contactos</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--<li><a><i class="fa fa-bar-chart-o"></i> Charts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="#">Chart JS</a>
                                        </li>
                                        <li><a href="#">Chart JS2</a>
                                        </li>
                                    </ul>
                                </li>-->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a href="<?php echo Yii::app()->createUrl('/parametros/index'); ?>" data-toggle="tooltip" data-placement="top" title="Parametros">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/historial/index'); ?>" data-toggle="tooltip" data-placement="top" title="Historial">
                            <span class="fa fa-history" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/empresa/index'); ?>" data-toggle="tooltip" data-placement="top" title="Empresa">
                            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>" data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="nav toggle">
                            <a href="<?php echo Yii::app()->createUrl('/ordenes/create'); ?>" id="menu_toggle"><i class="fa fa-file-text"></i></a>
                        </div>
                        <div class="nav toggle">
                            <?php echo CHtml::link('<i class="fa fa-search"></i>','#',array('class'=>'buscador')); ?>
                        </div>
                        <ul class="nav navbar-nav navbar-right menu-left">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                   <?php echo CHtml::image(Yii::app()->controller->createUrl('usuarios/loadImage', array('id'=>Yii::app()->user->id))); ?>
                                    <?php echo Yii::app()->user->name ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu wow fadeInDown pull-right" data-wow-duration="0.5s">
                                    <li><a href="<?php echo Yii::app()->createUrl('/usuarios/view',array('id'=>Yii::app()->user->id)); ?>">  Perfil</a></li>
                                    <li>
                                        <a href="<?php echo Yii::app()->createUrl('/usuarios/update',array('id'=>Yii::app()->user->id)); ?>">
                                           <!--  <span class="badge bg-red pull-right">50%</span> -->
                                            <!-- <span>Settings</span> -->
                                            Ajustes
                                        </a>
                                    </li>
<!--                                     <li>
                                        <a href="javascript:;">Help</a>
                                    </li> -->
                                    <li><a href="<?php echo Yii::app()->createUrl('/site/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                <?php $this->widget('ext.Hzl.toastr.HzlToastr', array(
                            'flashMessagesOnly'=> false,
                            'options' => array(
                                "closeButton" => true,
                                "positionClass" => "toast-bottom-right",
                                "showDuration" => "300",
                                "hideDuration" => "1000",
                                "timeOut" => "15000",
                                "extendedTimeOut" => "1000",
                                "showEasing" => "swing",
                                "hideEasing" => "linear",
                                "showMethod" => "fadeIn",
                                "hideMethod" => "fadeOut"
                            )
                        ));
                ?>
                <div class="datos_container">
                    <?php echo $content; ?>
                </div>
            </div>
            <!-- /page content -->

        </div>

    </div>


  <?php }else{ ?>
    <div class="login">
        <div class="login_container">
            <?php echo $content; ?>
        </div>
    </div>    
  <?php } ?>

<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/wow.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/nicescroll/jquery.nicescroll.min.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap-notify.js',CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/atomit.js',CClientScript::POS_END) ?>

    

</body>
</html>



