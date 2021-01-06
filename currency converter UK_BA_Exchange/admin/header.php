<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>BAExchange</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="css/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header">
            <a class="app-header__logo" href="">BA-EX</a>
            <!-- Sidebar toggle button-->
            <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
            <!-- Navbar Right Menu-->
            <ul class="app-nav">



                <!-- User Menu-->
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i> </a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <!--                        <li>
                                                    <a class="dropdown-item" href=""><i class="fa fa-cog fa-lg"></i> Settings</a
                                                    >
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> Profile</a>
                                                </li>-->
                        <li>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">

            <ul class="app-menu">
<!--                <li>-->
<!--                    <a class="app-menu__item" href="add-news.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Add News</span></a>-->
<!--                </li>-->
              <!--   <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-laptop"></i>
                        <span class="app-menu__label">Quiz</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="add-news.php">
                                <i class="icon fa fa-circle-o"></i> Add Quiz</a>
                        </li>

                        <li>
                            <a class="treeview-item" href="manage-quiz.php"><i class="icon fa fa-circle-o"></i> Manage Quiz</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="manage-quiz-group.php"><i class="icon fa fa-circle-o"></i> Manage Quiz Group</a>
                        </li>
                    </ul>
                </li> -->


                <li>
                    <a class="app-menu__item" href="manage-news.php"
                       ><i class="app-menu__icon fa fa-dashboard"></i
                        ><span class="app-menu__label">Manage Currency</span
                        ></a>

                </li>



<!--                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                       ><i class="app-menu__icon fa fa-edit"></i
                        ><span class="app-menu__label">Details 3</span
                        ><i class="treeview-indicator fa fa-angle-right"></i
                        ></a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a
                            >
                        </li>
                        <li>
                            <a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a>
                        </li>
                        <li>
                            <a class="treeview-item" href="form-samples.html"
                               ><i class="icon fa fa-circle-o"></i> Form Samples</a
                            >
                        </li>
                        <li>
                            <a class="treeview-item" href="form-notifications.html"
                               ><i class="icon fa fa-circle-o"></i> Form Notifications</a
                            >
                        </li>
                    </ul>
                </li>-->


            </ul>
        </aside>


