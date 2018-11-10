<?php 
	session_start();
	if (!$_SESSION['validar']) {
		header('location: login.php');
		exit();
	}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> ELITE | AUTOLAVADO </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="Views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="shortcut icon" href="Views/dist/img/ELITE.jpg">
  <link rel="stylesheet" href="Views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Views/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="Views/dist/css/skins/skin-black.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ELITE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>AutoLavado | ELITE</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Rigt Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="Views/dist/img/ELITE.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><b>Sesion: <?PHP echo $_SESSION['usuario'];?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="Views/dist/img/ELITE.jpg" alt="User Image">

                <p>
                   <?php
                  echo " ". $_SESSION['usuario'];
                   ?>| ELITE
                  <small>ELITE | USUARIO</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="index.php?action=salir" class="btn bg-black btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="#">
          <img src="Views/dist/img/ELITE.jpg"  width="150" height = "130" class="img-circle" alt="User Image">
        </div>
       
      </div>

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><strong><font size ="3">Menú </font></strong></li>
        <!-- Optionally, you can add icons to the links -->
        <li class="#"><a ><strong><i class="fa fa-key"></i></strong><span>Mi ID:  <?php echo '<font size = "5">'.$_SESSION['usuario_id'].'</font>'; ?></span></a></li>
        <li class="#"><a ><strong><i class="fa fa-check-square"></strong></i><span> VISITAS:  <?php $visita = new Controller();echo '<font size = "5">'.$visita->visitas().'</font>';?></span></a></li>
        <li class="active"><a href="index.php?action=inicio"><i class="fa fa-home"></i> <span>INICIO</span></a></li>

        <!-- vista menu -->
         <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-map-marker"><strong></i><span>MAPA</span></strong>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=mapa"><i class="fa fa-map"></i>¿Cómo llegar?</a></li>
          </ul>
        </li>
       

       <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-calendar"><strong></i><span>HORARIO</span></strong>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=horario"><i class="fa fa-eye"></i>Ver horario</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"><strong></i><span>CONFIGURACIÓN</span></strong>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?action=contra"><i class="glyphicon glyphicon-lock"></i>Cambiar contraseña</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"><i class="fa  fa-laptop"><strong></i><span>MÁS</span></strong>
             <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="index.php?action=acerca"><i class="fa fa-exclamation-circle"></i>ACERCA DE.</a></li>
          </ul>
        </li>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: #d2d6de ">

    <!--   Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
      <?php
// OBJE DE LA CLASE CONTROLLER Y FUNCION DE LA MISMA CLASE
      $mvc = new Controller();
      $mvc->enlacesPaginasController();


      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer" style= "background: black">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Tecnologías y Aplicaciones Web
    </div>
    <!-- Default to the left -->
    <strong style="color: white"> Estefania Rodriguez | Ramón Mata <a href="#"></a></strong><br>
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="Views/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="Views/dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>