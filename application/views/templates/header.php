<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ayni</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" >
    <!-- Bootstrap CSS
		============================================ -->
    <!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?=base_url()?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/font-awesome.min.css">


    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/meanmenu.min.css">


    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/metisMenu/metisMenu-vertical.css">


    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>css/responsive.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url()?>node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url()?>css/buttons.dataTables.min.css">

</head>
<body>
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="<?=base_url()?>Main"><img class="main-logo" width="100" src="<?=base_url()?>img/ayni.jpg" alt="" /></a>
            <!--            <strong><img src="img/logo/logosn.png" alt="" /></strong>-->
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a class="has-arrow" aria-expanded="false"><i class="fa big-icon fa-envelope icon-wrap"></i> <span class="mini-click-non">Registros</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="<?=base_url()?>Book"><i class="fa fa-inbox sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Libros</span></a></li>
                            <li><a title="View Mail" href="<?=base_url()?>Students"><i class="fa fa-television sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Estudiantes</span></a></li>
                            <li><a title="Compose Mail" href="<?=base_url()?>Profesores"><i class="fa fa-paper-plane sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Profesores</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" aria-expanded="false"><i class="fa big-icon fa-bar-chart-o icon-wrap"></i> <span class="mini-click-non">Listados</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Listados Docentes" href="<?=base_url()?>Listados/docentes"><i class="fa fa-line-chart sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Docentes</span></a></li>
                            <li><a title="Listados Estudiantes" href="<?=base_url()?>Listados/estudiantes"><i class="fa fa-area-chart sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Estudiantes</span></a></li>
                            <li><a title="Listado libros" href="<?=base_url()?>Listados/libros"><i class="fa fa-pie-chart sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Libros</span></a></li>
<!--                            <li><a title="Rounded Charts" href="rounded-chart.html"><i class="fa fa-signal sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Rounded Charts</span></a></li>-->
<!--                            <li><a title="C3 Charts" href="c3.html"><i class="fa fa-barcode sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">C3 Charts</span></a></li>-->
<!--                            <li><a title="Sparkline Charts" href="sparkline.html"><i class="fa fa-sort-amount-desc sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Sparkline Charts</span></a></li>-->
<!--                            <li><a title="Peity Charts" href="peity.html"><i class="fa fa-object-ungroup sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Peity Charts</span></a></li>-->
                        </ul>
                    </li>
                    <?php if ($_SESSION['profesion']=="AYNI" || $_SESSION['profesion']=="Directora" || $_SESSION['profesion']=="Director" ): ?>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa fa-print icon-wrap"></i> <span class="mini-click-non">Imprimir todo</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a  href="<?=base_url()?>Imprimir"><i class="fa fa-map-marker sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Credenciales</span></a></li>
                                <li><a  href="<?=base_url()?>Imprimir/libros"><i class="fa fa-book sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Libros</span></a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php if ($_SESSION['colegio']=="AYNI"): ?>
                        <li>
                            <a  href="<?=base_url()?>Importar" ><i class="fa big-icon fa-archive icon-wrap"></i> <span class="mini-click-non">Importar datos</span></a>
                        </li>
                        <li>
                            <a  href="<?=base_url()?>Config" ><i class="fa big-icon fa-cogs icon-wrap"></i> <span class="mini-click-non">Configuraciones</span></a>
                        </li>
                    <?php else:?>
                        <li>
                            <a title="Landing Page" href="<?=base_url()?>Prestamos" aria-expanded="false"><i class="fa fa-bookmark icon-wrap sub-icon-mg" aria-hidden="true"></i> <span class="mini-click-non">Prestamos </span></a>
                        </li>
                        <li>
                            <a title="Landing Page" href="<?=base_url()?>Buscar" aria-expanded="false"><i class="fa fa-eye" aria-hidden="true"></i> <span class="mini-click-non">Buscar </span></a>
                        </li>
                    <li>
                        <a  href="<?=base_url()?>Exportar" ><i class="fa big-icon fa-pie-chart icon-wrap"></i> <span class="mini-click-non">Expotar datos</span></a>
                    </li>
                    <?php endif;?>


                    <!--                    <li>-->
                    <!--                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa big-icon fa-table icon-wrap"></i> <span class="mini-click-non">Data Tables</span></a>-->
                    <!--                        <ul class="submenu-angle" aria-expanded="false">-->
                    <!--                            <li><a title="Peity Charts" href="static-table.html"><i class="fa fa-table sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Static Table</span></a></li>-->
                    <!--                            <li><a title="Data Table" href="data-table.html"><i class="fa fa-th sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Data Table</span></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li>-->
                    <!--                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa big-icon fa-table icon-wrap"></i> <span class="mini-click-non">Forms Elements</span></a>-->
                    <!--                        <ul class="submenu-angle" aria-expanded="false">-->
                    <!--                            <li><a title="Basic Form Elements" href="basic-form-element.html"><i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Bc Form Elements</span></a></li>-->
                    <!--                            <li><a title="Advance Form Elements" href="advance-form-element.html"><i class="fa fa-lightbulb-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Ad Form Elements</span></a></li>-->
                    <!--                            <li><a title="Password Meter" href="password-meter.html"><i class="fa fa-hourglass sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Password Meter</span></a></li>-->
                    <!--                            <li><a title="Multi Upload" href="multi-upload.html"><i class="fa fa-hdd-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Multi Upload</span></a></li>-->
                    <!--                            <li><a title="Text Editor" href="tinymc.html"><i class="fa fa-globe sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Text Editor</span></a></li>-->
                    <!--                            <li><a title="Dual List Box" href="dual-list-box.html"><i class="fa fa-hand-paper-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Dual List Box</span></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li class="active">-->
                    <!--                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa big-icon fa-desktop icon-wrap"></i> <span class="mini-click-non">App views</span></a>-->
                    <!--                        <ul class="submenu-angle" aria-expanded="false">-->
                    <!--                            <li><a title="Notifications" href="notifications.html"><i class="fa fa-external-link-square sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Notifications</span></a></li>-->
                    <!--                            <li><a title="Alerts" href="alerts.html"><i class="fa fa-crop sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Alerts</span></a></li>-->
                    <!--                            <li><a title="Modals" href="modals.html"><i class="fa fa-building sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Modals</span></a></li>-->
                    <!--                            <li><a title="Buttons" href="buttons.html"><i class="fa fa-adjust sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Buttons</span></a></li>-->
                    <!--                            <li><a title="Tabs" href="tabs.html"><i class="fa fa-eye sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Tabs</span></a></li>-->
                    <!--                            <li><a title="Accordion" href="accordion.html"><i class="fa fa-life-ring sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">Accordion</span></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                    <!--                    <li id="removable">-->
                    <!--                        <a class="has-arrow" href="#" aria-expanded="false"><i class="fa big-icon fa-files-o icon-wrap"></i> <span class="mini-click-non">Pages</span></a>-->
                    <!--                        <ul class="submenu-angle" aria-expanded="false">-->
                    <!--                            <li><a title="Login" href="login.html"><i class="fa fa-hand-rock-o sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Login</span></a></li>-->
                    <!--                            <li><a title="Register" href="register.html"><i class="fa fa-plane sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Register</span></a></li>-->
                    <!--                            <li><a title="Lock" href="lock.html"><i class="fa fa-file sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Lock</span></a></li>-->
                    <!--                            <li><a title="Password Recovery" href="password-recovery.html"><i class="fa fa-wheelchair sub-icon-mg" aria-hidden="true"></i><span class="mini-sub-pro">Password Recovery</span></a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->

                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="<?=base_url()?>img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">-->
                                <!--                                    <div class="header-top-menu tabl-d-n">-->
                                <!--                                        <ul class="nav navbar-nav mai-top-nav">-->
                                <!--                                            <li class="nav-item"><a href="#" class="nav-link">Home</a>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item"><a href="#" class="nav-link">About</a>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item"><a href="#" class="nav-link">Services</a>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item"><a href="#" class="nav-link">Support</a>-->
                                <!--                                            </li>-->
                                <!--                                        </ul>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">-->
                                <!--                                    <div class="header-right-info">-->
                                <!--                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">-->
                                <!--                                            <li class="nav-item dropdown">-->
                                <!--                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-envelope-o adminpro-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>-->
                                <!--                                                <div role="menu" class="author-message-top dropdown-menu animated zoomIn">-->
                                <!--                                                    <div class="message-single-top">-->
                                <!--                                                        <h1>Message</h1>-->
                                <!--                                                    </div>-->
                                <!--                                                    <ul class="message-menu">-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="message-img">-->
                                <!--                                                                    <img src="img/contact/1.jpg" alt="">-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="message-content">-->
                                <!--                                                                    <span class="message-date">16 Sept</span>-->
                                <!--                                                                    <h2>Advanda Cro</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="message-img">-->
                                <!--                                                                    <img src="img/contact/4.jpg" alt="">-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="message-content">-->
                                <!--                                                                    <span class="message-date">16 Sept</span>-->
                                <!--                                                                    <h2>Sulaiman din</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="message-img">-->
                                <!--                                                                    <img src="img/contact/3.jpg" alt="">-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="message-content">-->
                                <!--                                                                    <span class="message-date">16 Sept</span>-->
                                <!--                                                                    <h2>Victor Jara</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="message-img">-->
                                <!--                                                                    <img src="img/contact/2.jpg" alt="">-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="message-content">-->
                                <!--                                                                    <span class="message-date">16 Sept</span>-->
                                <!--                                                                    <h2>Victor Jara</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                    </ul>-->
                                <!--                                                    <div class="message-view">-->
                                <!--                                                        <a href="#">View All Messages</a>-->
                                <!--                                                    </div>-->
                                <!--                                                </div>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>-->
                                <!--                                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">-->
                                <!--                                                    <div class="notification-single-top">-->
                                <!--                                                        <h1>Notifications</h1>-->
                                <!--                                                    </div>-->
                                <!--                                                    <ul class="notification-menu">-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="notification-icon">-->
                                <!--                                                                    <i class="fa fa-check adminpro-checked-pro admin-check-pro" aria-hidden="true"></i>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="notification-content">-->
                                <!--                                                                    <span class="notification-date">16 Sept</span>-->
                                <!--                                                                    <h2>Advanda Cro</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="notification-icon">-->
                                <!--                                                                    <i class="fa fa-cloud adminpro-cloud-computing-down" aria-hidden="true"></i>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="notification-content">-->
                                <!--                                                                    <span class="notification-date">16 Sept</span>-->
                                <!--                                                                    <h2>Sulaiman din</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="notification-icon">-->
                                <!--                                                                    <i class="fa fa-eraser adminpro-shield" aria-hidden="true"></i>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="notification-content">-->
                                <!--                                                                    <span class="notification-date">16 Sept</span>-->
                                <!--                                                                    <h2>Victor Jara</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li>-->
                                <!--                                                            <a href="#">-->
                                <!--                                                                <div class="notification-icon">-->
                                <!--                                                                    <i class="fa fa-line-chart adminpro-analytics-arrow" aria-hidden="true"></i>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="notification-content">-->
                                <!--                                                                    <span class="notification-date">16 Sept</span>-->
                                <!--                                                                    <h2>Victor Jara</h2>-->
                                <!--                                                                    <p>Please done this project as soon possible.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                            </a>-->
                                <!--                                                        </li>-->
                                <!--                                                    </ul>-->
                                <!--                                                    <div class="notification-view">-->
                                <!--                                                        <a href="#">View All Notification</a>-->
                                <!--                                                    </div>-->
                                <!--                                                </div>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item">-->
                                <!--                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">-->
                                <!--                                                    <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>-->
                                <!--                                                    <span class="admin-name">Advanda Cro</span>-->
                                <!--                                                    <i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>-->
                                <!--                                                </a>-->
                                <!--                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">-->
                                <!--                                                    <li><a href="register.html"><span class="fa fa-home author-log-ic"></span>Register</a>-->
                                <!--                                                    </li>-->
                                <!--                                                    <li><a href="#"><span class="fa fa-user author-log-ic"></span>My Profile</a>-->
                                <!--                                                    </li>-->
                                <!--                                                    <li><a href="lock.html"><span class="fa fa-diamond author-log-ic"></span> Lock</a>-->
                                <!--                                                    </li>-->
                                <!--                                                    <li><a href="#"><span class="fa fa-cog author-log-ic"></span>Settings</a>-->
                                <!--                                                    </li>-->
                                <!--                                                    <li><a href="login.html"><span class="fa fa-lock author-log-ic"></span>Log Out</a>-->
                                <!--                                                    </li>-->
                                <!--                                                </ul>-->
                                <!--                                            </li>-->
                                <!--                                            <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-tasks"></i></a>-->
                                <!---->
                                <!--                                                <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">-->
                                <!--                                                    <ul class="nav nav-tabs custon-set-tab">-->
                                <!--                                                        <li class="active"><a data-toggle="tab" href="#Notes">News</a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li><a data-toggle="tab" href="#Projects">Activity</a>-->
                                <!--                                                        </li>-->
                                <!--                                                        <li><a data-toggle="tab" href="#Settings">Settings</a>-->
                                <!--                                                        </li>-->
                                <!--                                                    </ul>-->
                                <!---->
                                <!--                                                    <div class="tab-content custom-bdr-nt">-->
                                <!--                                                        <div id="Notes" class="tab-pane fade in active">-->
                                <!--                                                            <div class="notes-area-wrap">-->
                                <!--                                                                <div class="note-heading-indicate">-->
                                <!--                                                                    <h2><i class="fa fa-comments-o"></i> Latest News</h2>-->
                                <!--                                                                    <p>You have 10 New News.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="notes-list-area notes-menu-scrollbar">-->
                                <!--                                                                    <ul class="notes-menu-list">-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/4.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/1.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/2.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/3.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/4.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/1.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/2.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/1.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/2.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="notes-list-flow">-->
                                <!--                                                                                    <div class="notes-img">-->
                                <!--                                                                                        <img src="img/contact/3.jpg" alt="" />-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                    <div class="notes-content">-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>-->
                                <!--                                                                                        <span>Yesterday 2:45 pm</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                    </ul>-->
                                <!--                                                                </div>-->
                                <!--                                                            </div>-->
                                <!--                                                        </div>-->
                                <!--                                                        <div id="Projects" class="tab-pane fade">-->
                                <!--                                                            <div class="projects-settings-wrap">-->
                                <!--                                                                <div class="note-heading-indicate">-->
                                <!--                                                                    <h2><i class="fa fa-cube"></i> Recent Activity</h2>-->
                                <!--                                                                    <p> You have 20 Recent Activity.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                                <div class="project-st-list-area project-st-menu-scrollbar">-->
                                <!--                                                                    <ul class="projects-st-menu-list">-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New User Registered</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">1 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New Order Received</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">2 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New Order Received</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">3 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New Order Received</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">4 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New User Registered</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">5 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New Order</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">6 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New User</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">7 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                        <li>-->
                                <!--                                                                            <a href="#">-->
                                <!--                                                                                <div class="project-list-flow">-->
                                <!--                                                                                    <div class="projects-st-heading">-->
                                <!--                                                                                        <h2>New Order</h2>-->
                                <!--                                                                                        <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>-->
                                <!--                                                                                        <span class="project-st-time">9 hours ago</span>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </a>-->
                                <!--                                                                        </li>-->
                                <!--                                                                    </ul>-->
                                <!--                                                                </div>-->
                                <!--                                                            </div>-->
                                <!--                                                        </div>-->
                                <!--                                                        <div id="Settings" class="tab-pane fade">-->
                                <!--                                                            <div class="setting-panel-area">-->
                                <!--                                                                <div class="note-heading-indicate">-->
                                <!--                                                                    <h2><i class="fa fa-gears"></i> Settings Panel</h2>-->
                                <!--                                                                    <p> You have 20 Settings. 5 not completed.</p>-->
                                <!--                                                                </div>-->
                                <!--                                                                <ul class="setting-panel-list">-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Show notifications</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Disable Chat</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example3">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Enable history</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example4">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Show charts</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example7">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Update everyday</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example2">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Global search</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example6">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                    <li>-->
                                <!--                                                                        <div class="checkbox-setting-pro">-->
                                <!--                                                                            <div class="checkbox-title-pro">-->
                                <!--                                                                                <h2>Offline users</h2>-->
                                <!--                                                                                <div class="ts-custom-check">-->
                                <!--                                                                                    <div class="onoffswitch">-->
                                <!--                                                                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">-->
                                <!--                                                                                        <label class="onoffswitch-label" for="example5">-->
                                <!--                                                                                            <span class="onoffswitch-inner"></span>-->
                                <!--                                                                                            <span class="onoffswitch-switch"></span>-->
                                <!--                                                                                        </label>-->
                                <!--                                                                                    </div>-->
                                <!--                                                                                </div>-->
                                <!--                                                                            </div>-->
                                <!--                                                                        </div>-->
                                <!--                                                                    </li>-->
                                <!--                                                                </ul>-->
                                <!---->
                                <!--                                                            </div>-->
                                <!--                                                        </div>-->
                                <!--                                                    </div>-->
                                <!--                                                </div>-->
                                <!--                                            </li>-->
                                <!--                                        </ul>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="index.html">Dashboard v.1</a></li>
                                            <li><a href="index-1.html">Dashboard v.2</a></li>
                                            <li><a href="index-3.html">Dashboard v.3</a></li>
                                            <li><a href="product-list.html">Product List</a></li>
                                            <li><a href="product-edit.html">Product Edit</a></li>
                                            <li><a href="product-detail.html">Product Detail</a></li>
                                            <li><a href="product-cart.html">Product Cart</a></li>
                                            <li><a href="product-payment.html">Product Payment</a></li>
                                            <li><a href="analytics.html">Analytics</a></li>
                                            <li><a href="widgets.html">Widgets</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="demo" class="collapse dropdown-header-top">
                                            <li><a href="mailbox.html">Inbox</a>
                                            </li>
                                            <li><a href="mailbox-view.html">View Mail</a>
                                            </li>
                                            <li><a href="mailbox-compose.html">Compose Mail</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="others" class="collapse dropdown-header-top">
                                            <li><a href="file-manager.html">File Manager</a></li>
                                            <li><a href="contacts.html">Contacts Client</a></li>
                                            <li><a href="projects.html">Project</a></li>
                                            <li><a href="project-details.html">Project Details</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                            <li><a href="500.html">500 Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                            <li><a href="google-map.html">Google Map</a>
                                            </li>
                                            <li><a href="data-maps.html">Data Maps</a>
                                            </li>
                                            <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                            </li>
                                            <li><a href="x-editable.html">X-Editable</a>
                                            </li>
                                            <li><a href="code-editor.html">Code Editor</a>
                                            </li>
                                            <li><a href="tree-view.html">Tree View</a>
                                            </li>
                                            <li><a href="preloader.html">Preloader</a>
                                            </li>
                                            <li><a href="images-cropper.html">Images Cropper</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Chartsmob" class="collapse dropdown-header-top">
                                            <li><a href="bar-charts.html">Bar Charts</a>
                                            </li>
                                            <li><a href="line-charts.html">Line Charts</a>
                                            </li>
                                            <li><a href="area-charts.html">Area Charts</a>
                                            </li>
                                            <li><a href="rounded-chart.html">Rounded Charts</a>
                                            </li>
                                            <li><a href="c3.html">C3 Charts</a>
                                            </li>
                                            <li><a href="sparkline.html">Sparkline Charts</a>
                                            </li>
                                            <li><a href="peity.html">Peity Charts</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Tablesmob" class="collapse dropdown-header-top">
                                            <li><a href="static-table.html">Static Table</a>
                                            </li>
                                            <li><a href="data-table.html">Data Table</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="formsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a>
                                            </li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                            </li>
                                            <li><a href="password-meter.html">Password Meter</a>
                                            </li>
                                            <li><a href="multi-upload.html">Multi Upload</a>
                                            </li>
                                            <li><a href="tinymc.html">Text Editor</a>
                                            </li>
                                            <li><a href="dual-list-box.html">Dual List Box</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a>
                                            </li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                            </li>
                                            <li><a href="password-meter.html">Password Meter</a>
                                            </li>
                                            <li><a href="multi-upload.html">Multi Upload</a>
                                            </li>
                                            <li><a href="tinymc.html">Text Editor</a>
                                            </li>
                                            <li><a href="dual-list-box.html">Dual List Box</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Pagemob" class="collapse dropdown-header-top">
                                            <li><a href="login.html">Login</a>
                                            </li>
                                            <li><a href="register.html">Register</a>
                                            </li>
                                            <li><a href="lock.html">Lock</a>
                                            </li>
                                            <li><a href="password-recovery.html">Password Recovery</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="breadcome-heading">
                                        <!--                                        <form role="search" class="">-->
                                        <!--                                            <input type="text" placeholder="Search..." class="form-control">-->
                                        <!--                                            <a href=""><i class="fa fa-search"></i></a>-->
                                        <!--                                        </form>-->
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <ul class="breadcome-menu">
                                        <li>
                                            <a > <i class="fa fa-user"></i> <?=$_SESSION['usuario']?></a> <span class="span-left">/</span>
                                        </li>
                                        <li>
                                            <a > <i class="fa fa-comment"></i> <?=$_SESSION['profesion']?></a> <span class="span-left">/</span>
                                        </li>
                                        <li>
                                            <a > <i class="fa fa-home"></i> <?=$_SESSION['colegio']?></a> <span class="span-left">/</span>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>Welcome/logout"> <i class="fa fa-sign-out"></i>SALIR</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button start-->
    <div class="button-adminpro-area mg-tb-15">
        <div class="container-fluid">
            <div class="row">
