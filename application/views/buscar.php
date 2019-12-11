<!doctype html>
<html lang="es">
<?php
$colegio=$_SESSION['colegio'];
?>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">

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
        <!-- Mobile Menu end -->
        <div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <a href="<?=base_url()?>Main"><img class="main-logo" width="100" src="<?=base_url()?>img/ayni.jpg" alt="" /></a>
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
    <?php
    $colegio=$_SESSION['colegio'];
    ?>
    <div class="button-ad-wrap" style="width: 100%">
        <!-- Button trigger modal -->

        <form action="<?=base_url()?>Book/Kardex" method="post" target="_blank">

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Fecha</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Area</th>
                    <th>Tematica</th>
                    <th>Idioma</th>
                    <th>Codigo</th>
                    <th>Curso</th>
                    <th>Colegio</th>
                    <th>En prestamo?</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($colegio=='AYNI'){
                    $query=$this->db->query("SELECT * FROM libro ORDER  BY codarea,codsubarea");
                }else{
                    $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio' ORDER  BY codarea,codsubarea");
                }
                foreach ($query->result() as $row){
                    if ($row->estado=="Malo"){
                        $in="";
                        $ba="<a href='".base_url()."Book/alta/$row->idlibro'  class='btn btn-warning p-1'> <i class='fa fa-upload'></i> Dar Alta</a>";
                    }else{
                        $in="<input type='checkbox' class='case' name='c$row->idlibro'>";
                        $ba="<a href='".base_url()."Book/baja/$row->idlibro'  class='confirmar btn btn-danger p-1'> <i class='fa fa-close'></i> Dar Baja</a>";
                    }
                    echo "<tr>
                    <td>$in</td>
                    <td>$row->fecha</td>
                    <td>$row->titulo</td>
                    <td>$row->autor</td>
                    <td> $row->codarea.$row->area</td>
                    <td>$row->codsubarea.$row->tematica</td>
                    <td>$row->idioma</td>
                    <td>$row->codigo</td>
                    <td>$row->nivel</td>
                    <td>$row->colegio</td>
                    <td>$row->status</td>
                    <td>
                    </td>
                </tr>";
                }
                ?>

                </tbody>
            </table>
        </form>
    </div>
    <div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="<?=base_url()?>Book/update" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Colegio</label>

                            <div class="col-sm-3">
                                <?php
                                $colegio=$_SESSION['colegio'];
                                if ($colegio=='AYNI'):
                                    ?>
                                    <input list="colegios" type="text" name="colegio" class="form-control" id="colegio2" required>
                                    <datalist id="colegios">
                                        <?php
                                        $query=$this->db->query("SELECT colegio FROM libro GROUP BY colegio");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->colegio'>";
                                        }
                                        ?>
                                    </datalist>
                                <?php else:?>
                                    <input type="text" name="colegio" id="colegio2" value="<?=$colegio?>" hidden>
                                    <label ><?=$colegio?></label>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="nroserie" id="nroserie2" class="form-control" required placeholder="Nro Serie">
                                <input type="number" name="idlibro" id="idlibro2"  required hidden >
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="nroalcaldia" id="nroalcaldia2" class="form-control" required placeholder="Nro alcaldia">
                            </div>
                            <label class="col-sm-1" >Autor</label>
                            <div class="col-sm-3">
                                <!--                                <input type="text" name="autor" class="form-control" placeholder="Apellido nombres">-->
                                <input list="autor" name="autor" id="autor2" class="form-control"placeholder="Autor">
                                <datalist id="autor">
                                    <?php
                                    $query=$this->db->query("SELECT autor FROM libro GROUP BY autor");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->autor'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-1" >Titulo</label>
                            <div class="col-sm-3">
                                <input list="titulos" name="titulo" id="titulo2" class="form-control"placeholder="Titulor">
                                <datalist id="titulos">
                                    <?php
                                    $query=$this->db->query("SELECT titulo FROM libro GROUP BY titulo");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->titulo'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-1" >Original</label>
                            <div class="col-sm-1">
                                <select name="original" class="form-control" id="original2" required>
                                    <option value="">Selecionar..</option>
                                    <option value="ORIGINAL">ORIGINAL</option>
                                    <option value="FOTOCOPIA">FOTOCOPIA</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" name="anioedicion" id="anioedicion2" class="form-control" required placeholder="Año Edicion">
                            </div>

                            <label class="col-sm-1" >Incremento</label>
                            <div class="col-sm-3">
                                <?php
                                $query=$this->db->query("SELECT *  FROM libro WHERE colegio='$colegio'");
                                if($query->num_rows()>0){
                                    $incremento=$query->row()->incremento;
                                }else{
                                    $incremento=0;
                                }

                                ?>
                                <input type="number" name="incremento" id="incremento2" class="form-control" value="<?=$incremento?>" required placeholder="Incremento">
                            </div>
                            <label class="col-sm-1" >editorial</label>
                            <div class="col-sm-3">
                                <input type="text" name="editorial" id="editorial2" class="form-control" required placeholder="editorial">
                            </div>
                            <label class="col-sm-1" >procedencia</label>
                            <div class="col-sm-3">
                                <input type="text" name="pais" id="procedencia2" class="form-control" required placeholder="procedencia">
                            </div>
                            <label class="col-sm-1" >estado</label>
                            <div class="col-sm-3">
                                <select name="estado" class="form-control" id="estado2" required>
                                    <option value="">Selecionar..</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                </select>
                            </div>

                            <label class="col-sm-1" >idioma</label>

                            <div class="col-sm-3">
                                <input list="idioma" name="idioma" id="idioma2" class="form-control" placeholder="Idioma">
                                <datalist id="idioma">
                                    <?php
                                    $query=$this->db->query("SELECT idioma FROM libro GROUP BY idioma");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->idioma'>";
                                    }
                                    ?>
                                </datalist>

                            </div>
                            <label class="col-sm-1">Grado</label>
                            <div class="col-sm-3">
                                <select name="nivel" id="nivel2"  class="form-control" required>
                                    <!--                                    <option value="">Selecionar..</option>-->
                                    <option value="1">Primero</option>
                                    <option value="2">Segundo</option>
                                    <option value="3">Tercero</option>
                                    <option value="4">Cuarto</option>
                                    <option value="5">Quinto</option>
                                    <option value="6">Sexto</option>
                                    <option value="7">Septimo</option>
                                    <option value="8">Octavo</option>
                                    <option value="9">Noveno</option>
                                    <option value="10">Decimo</option>
                                    <option value="11">Undecimo</option>
                                    <option value="12">Duodecimo</option>
                                    <option value="13">Profesores</option>
                                </select>
                            </div>
                            <label class="col-sm-1" hidden>Area</label>
                            <div class="col-sm-3" hidden>
                                <select name="area" class="form-control" required id="area2">
                                    <!--                                <option value="">Selecionar..</option>-->
                                    <?php
                                    $query=$this->db->query("SELECT area FROM libro GROUP BY area");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->area'>$row->area</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-1" hidden>Tematica</label>
                            <div class="col-sm-3" hidden>
                                <select name="tematica" class="form-control" required id="tematica2">
                                    <!--                                    <option value="">Selecionar..</option>-->
                                    <?php
                                    $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->tematica'>$row->tematica</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label class="col-sm-1" hidden>codigo</label>
                            <div class="col-sm-3" hidden>
                                <input type="text" name="codigo" class="form-control" id="codigo2" required placeholder="codigo">
                                <span class=""></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script !src="">
        window.onload=function (e) {
            $('#area').change(function (e) {
                // console.log($('#colegio').val());
                if ($('#colegio').val()==''){
                    alert('primero selecionar colegio');
                    $('#area').val('');
                    return false;
                }
                var division = $(this).val().split('.');
                var area=(division[1]);
                $.ajax({
                    data:'area='+area,
                    type:'POST',
                    url:'Book/datos',
                    success:function (e) {
                        var datos= JSON.parse(e);
                        console.log(datos);

                        $('#tematicas').html('');
                        <?php if ($colegio=='AYNI'): ?>
                        datos.forEach(function (e) {
                            $('#tematica').val('');
                            $('#tematicas').append('<option value="'+e.codsubarea+'.'+e.tematica+'">');
                        });
                        <?php else:?>
                        $('#tematica').html('<option value="">Selecionar..</option>');
                        datos.forEach(function (e) {
                            $('#tematica').append('<option value="'+e.codsubarea+'.'+e.tematica+'">'+e.codsubarea+'.'+e.tematica+'</option>');
                        });
                        <?php endif;?>

                        $.ajax({
                            data:'area='+area,
                            type:'POST',
                            url:'Book/codarea',
                            success:function (e) {
                                $('#codarea').val(e);
                            }
                        });
                    }
                })
                e.preventDefault();
            });
            $('#tematica').change(function (e) {
                e.preventDefault();
                // console.log($('#tematica').val());
                var division = $('#tematica').val().split('.');
                var tematica=(division[1]);
                // console.log(tematica);
                $.ajax({
                    data:'tematica='+tematica,
                    type:'POST',
                    url:'Book/codtematica',
                    success:function (e) {
                        // console.log(e);
                        $('#codtematica').val(e);
                        /////////////////////////////////////////////////////////////////////////////////
                        if ($('#colegio').val()==''){
                            alert('primero selecionar colegio');
                            return false;
                        }
                        if ($('#nivel').val()=='' || $('#area').val()=='' || $('#tematica').val()==''){
                            alert('debe llenar los campos de nivel area y tematica');
                        }else{
                            var division = $('#tematica').val().split('.');
                            var tematica=(division[1]);
                            // console.log(tematica);
                            <?php if ($colegio=='AYNI'): ?>
                            var datos={
                                nivel:$('#nivel').val(),
                                tematica:'a',
                                colegio:$('#colegio').val(),
                                incremento:$('#incremento').val(),
                                codtematica:$('#codtematica').val()
                            }
                            <?php else:?>
                            var datos={
                                nivel:$('#nivel').val(),
                                tematica:tematica,
                                colegio:$('#colegio').val(),
                                incremento:$('#incremento').val(),
                                codtematica:division[0]
                            }
                            <?php endif;?>

                            $.ajax({
                                url:'Book/codigo',
                                type:'POST',
                                data:datos,
                                success:function (e) {
                                    console.log(e);
                                    if (e.length)
                                        $('#codigo').val(e);
                                }
                            })
                        }
                        // e.preventDefault();
                        ///////////////////////////
                    }
                });
            });
            $('#nivel').change(function (e) {
                if ($('#colegio').val()==''){
                    alert('primero selecionar colegio');
                    return false;
                }
                if ($('#nivel').val()=='' || $('#area').val()=='' || $('#tematica').val()==''){
                    alert('debe llenar los campos de nivel area y tematica');
                }else{
                    var division = $('#tematica').val().split('.');
                    var tematica=(division[1]);
                    // console.log(tematica);
                    <?php if ($colegio=='AYNI'): ?>
                    var datos={
                        nivel:$('#nivel').val(),
                        tematica:'a',
                        colegio:$('#colegio').val(),
                        incremento:$('#incremento').val(),
                        codtematica:$('#codtematica').val()
                    }
                    <?php else:?>
                    var datos={
                        nivel:$('#nivel').val(),
                        tematica:tematica,
                        colegio:$('#colegio').val(),
                        incremento:$('#incremento').val(),
                        codtematica:division[0]
                    }
                    <?php endif;?>

                    $.ajax({
                        url:'Book/codigo',
                        type:'POST',
                        data:datos,
                        success:function (e) {
                            console.log(e);
                            if (e.length)
                                $('#codigo').val(e);
                        }
                    })
                }
                e.preventDefault();
            });
            $('#codtematica').keyup(function (e) {
                e.preventDefault();
                $('#codigo').val($('#nivel').val()+'.'+$('#codtematica').val()+'.'+ parseInt( parseInt( $('#incremento').val())+1)).toString();
            });
            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).appendTo( '#example thead' );
            $('#example thead tr:eq(1) th').each( function (i) {
                // console.log(i);
                if (i==0){
                    $(this).html( '<input type="checkbox" id="selectall"/>ALL' );
                    $("#selectall").on("click", function() {
                        $(".case").attr("checked", this.checked);
                        console.log(this.checked);
                    });
                }else if (i==10){

                }else if (i==4){
                    $(this).html( '<select style="width:100px" >' +
                        '<option value="">Seleccionar..</option>' +
                        <?php
                        $query=$this->db->query("SELECT area,codarea FROM libro GROUP BY area ORDER BY codarea");
                        foreach ($query->result() as $row){
                            echo "'<option value=\"$row->area\">$row->codarea.$row->area</option>' +";
                        }
                        ?>
                        '</select>' );
                    $( 'select', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                            var div=$(this).val().split('.');
                            // console.log(div[0]);
                            $.ajax({
                                type:'POST',
                                data:'area='+div[0],
                                url:'Book/btematicas',
                                success:function(e){
                                    // console.log(e);
                                    var datos=JSON.parse(e);
                                    console.log(datos);
                                    $('#Btematica').html('<option value="">Seleccionar..</option>');
                                    datos.forEach(function (e) {
                                        $('#Btematica').append('<option value="'+e.codsubarea+'.'+e.tematica+'">'+e.codsubarea+'.'+e.tematica+'</option>');
                                    })
                                }
                            })
                        }
                    } );
                }else if (i==5){
                    $(this).html( '<select style="width:100px" id="Btematica" >' +
                        '<option value="">Seleccionar..</option>' +
                        <?php
                        $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica");
                        foreach ($query->result() as $row){
                            echo "'<option value=\"$row->tematica\">$row->tematica</option>' +";
                        }
                        ?>
                        '</select>' );
                    $( 'select', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
                else if (i==6){
                    $(this).html( '<select style="width:100px" >' +
                        '<option value="">Seleccionar..</option>' +
                        <?php
                        $query=$this->db->query("SELECT idioma FROM libro GROUP BY idioma");
                        foreach ($query->result() as $row){
                            echo "'<option value=\"$row->idioma\">$row->idioma</option>' +";
                        }
                        ?>
                        '</select>' );
                    $( 'select', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
                else if (i==8){
                    $(this).html( '<select style="width:100px" >' +
                        '<option value="">Seleccionar..</option>' +
                        '<option value="Primero">Primero</option>' +
                        '<option value="Segundo">Segundo</option>' +
                        '<option value="Tercero">Tercero</option>' +
                        '<option value="Cuarto">Cuarto</option>' +
                        '<option value="Quinto">Quinto</option>' +
                        '<option value="Sexto">Sexto</option>' +
                        '<option value="Septimo">Septimo</option>' +
                        '<option value="Octavo">Octavo</option>' +
                        '<option value="Noveno">Noveno</option>' +
                        '<option value="Decimo">Decimo</option>' +
                        '<option value="Undecimo">Undecimo</option>' +
                        '<option value="Duodecimo">Duodecimo</option>' +
                        '</select>' );
                    $( 'select', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
                else if (i==9){
                    $(this).html( '<select style="width:100px" >' +
                        '<option value="">Seleccionar..</option>' +
                        <?php
                        $query=$this->db->query("SELECT colegio FROM libro GROUP BY colegio");
                        foreach ($query->result() as $row){
                            echo "'<option value=\"$row->colegio\">$row->colegio</option>' +";
                        }
                        ?>
                        '</select>' );
                    $( 'select', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
                else{
                    var title = $(this).text();
                    $(this).html( '<input type="text" style="width: 100px;" placeholder="Buscar '+title+'" />' );
                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );
                }
            } );

            // var table = $('#example').DataTable( {
            //     orderCellsTop: true,
            //     fixedHeader: true
            // } );
            $('#colegio').change(function (e) {
                // console.log($(this).val().trim());
                $.ajax({
                    url:'Book/incremento/'+$(this).val().trim(),
                    success:function (e) {
                        $('#incremento').val(e);
                    }
                });
                e.preventDefault();
            });

            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                order:[[1,"desc"]],
                language:{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            $('#modificar').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var codigo = button.data('codigo') // Extract info from data-* attributes
                $.ajax({
                    url: 'Book/datoslibro/'+codigo,
                    success:function (e) {
                        var datos=JSON.parse(e)[0];
                        console.log(datos);
                        $('#nroserie2').val(datos.nroserie);
                        $('#idlibro2').val(datos.idlibro);
                        $('#nroalcaldia2').val(datos.nroalcaldia);
                        $('#colegio2').val(datos.colegio);
                        $('#titulo2').val(datos.titulo);
                        $('#autor2').val(datos.autor);
                        $('#original2').val(datos.original);
                        $('#anioedicion2').val(datos.anioedicion);
                        $('#pre2').val(datos.pre);
                        $('#incremento2').val(datos.incremento);
                        $('#procedencia2').val(datos.procedencia);
                        $('#estado2').val(datos.estado);
                        $('#idioma2').val(datos.idioma);
                        $('#nivel2').val(datos.nivelno);
                        $('#area2').val(datos.area);
                        $('#tematica2').val(datos.tematica);
                        $('#editorial2').val(datos.editorial);
                        $('#codigo2').val(datos.codigo);
                    }
                });
            })
        }
    </script>


    <!-- Button End-->
<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>Copyright ©
                        <script> document.write((new Date()).getFullYear())</script> Adimer Paul Chambi Ajata.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url()?>node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>node_modules/popper.js/dist/umd/popper.js"></script>
<script src="<?=base_url()?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--datatables-->
<script src="<?=base_url()?>node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>js/buttons.flash.min.js"></script>
<script src="<?=base_url()?>js/jszip.min.js"></script>
<script src="<?=base_url()?>js/pdfmake.min.js"></script>
<script src="<?=base_url()?>js/vfs_fonts.js"></script>
<script src="<?=base_url()?>js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>js/buttons.print.min.js"></script>


<script src="<?=base_url()?>assets/js/dataTables.fixedHeader.min.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="<?=base_url()?>js/jquery.meanmenu.js"></script>

<!-- sticky JS
    ============================================ -->
<script src="<?=base_url()?>js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="<?=base_url()?>js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="<?=base_url()?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?=base_url()?>js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="<?=base_url()?>js/metisMenu/metisMenu.min.js"></script>
<script src="<?=base_url()?>js/metisMenu/metisMenu-active.js"></script>

<script src="<?=base_url()?>js/main.js"></script>

</body>

</html>

