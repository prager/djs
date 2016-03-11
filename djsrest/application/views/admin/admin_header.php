<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ;?>/assets/css/custom.css">
    <!-- Font Awesome -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ;?>/assets/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ;?>/assets/admin/css/skins/_all-skins.min.css">
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ;?>/assets/js/bootstrap.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
  <body class="hold-transition skin-blue layout-boxed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url('home')?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>DJ</b>'s Bistro</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>DJ</b>'s Bistro</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url() ;?>/assets/admin/img/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url() ;?>/assets/admin/img/user.png" class="img-circle" alt="User Image">
                    <p>
                      Administrator
                      <small>COMP 394</small>
                    </p>
                  </li>
                 <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->              
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url() ;?>/assets/admin/img/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Public Navigation</li>
            <li><a href="<?php echo site_url('home')?>"><i class="glyphicon glyphicon-globe"></i> <span>Home </span></a></li>
            <li><a href="<?php echo site_url('reservations')?>"><i class="glyphicon glyphicon-globe"></i> <span>Reservations </span></a></li>
            <li><a href="<?php echo site_url('menu')?>"><i class="glyphicon glyphicon-globe"></i> <span>Menu </span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-globe"></i> <span>Contact us </span></a></li>
            
            <li class="header">Admin Navigation</li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i>
                <span >User Management</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/user_management')?>"><i class="glyphicon glyphicon-cog"></i> All Users</a></li>
                <li><a href="<?php echo site_url('admin/customer_management')?>"><i class="glyphicon glyphicon-cog"></i> Customer Management</a></li>
                <li><a href="<?php echo site_url('admin/employee_management')?>"><i class="glyphicon glyphicon-cog"></i> Employee Management</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('admin/feedback_management')?>"><i class="glyphicon glyphicon-envelope"></i> <span>Feedback Management</span></a></li>
            <li><a href="<?php echo site_url('admin/reservation_management')?>"><i class="glyphicon glyphicon-time"></i> <span>Reservation Management</span>
            <li><a href="<?php echo site_url('admin/credit_card_management')?>"><i class="glyphicon glyphicon-credit-card"></i> <span>Credit Card Management</span></a></li>
            <li><a href="<?php echo site_url('admin/food_menu_management')?>"><i class="glyphicon glyphicon-cutlery"></i> <span>Food Menu Management</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-transfer"></i> <span>Session Management</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-lock"></i>
                <span>Login and Permissions</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo site_url('admin/login_management')?>"><i class="glyphicon glyphicon-cog"></i> Login Management</a></li>
                <li><a href="<?php echo site_url('admin/user_group_management')?>"><i class="glyphicon glyphicon-cog"></i> User Group Management</a></li>
              </ul>
            </li>
            <li class="header">Quick Access</li>
            <li><a href="<?php echo site_url('admin/customer_management/add')?>"><i class="glyphicon glyphicon-plus"></i> <span>Add Customer</span></a></li>
            <li><a href="<?php echo site_url('admin/employee_management/add')?>"><i class="glyphicon glyphicon-plus"></i> <span>Add Employee</span></a></li>
            <li><a href="<?php echo site_url('admin/reservation_management/add')?>"><i class="glyphicon glyphicon-plus"></i> <span>Add Reservation</span></a></li>
            <li><a href="<?php echo site_url('admin/credit_card_management/add')?>"><i class="glyphicon glyphicon-plus"></i> <span>Add Credit Card</span></a></li>
            <li><a href="<?php echo site_url('admin/login_management/add')?>"><i class="glyphicon glyphicon-plus"></i> <span>Add Login</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->