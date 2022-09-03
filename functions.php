<?php
function draw_header($boolMenu=false, $title=""){
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Clínicas Médicas</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/nifty.min.css" rel="stylesheet">
        <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    </head>
    <body>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nifty.min.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>

        <div id="container" class="<?php print ($boolMenu) ? "effect aside-float aside-bright mainnav-lg" : "cls-container";?>">

        <?php
        if( $boolMenu ){
            ?>
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <div class="navbar-header">
                        <a href="/vacunacion" class="navbar-brand">
                            <img src="img/logo.png" alt="Centro de Salud" class="brand-icon">
                            <div class="brand-title" style="white-space: nowrap;">
                                <span class="brand-text">&nbsp;Clínicas Médicas</span>
                            </div>
                        </a>
                    </div>
                    <div class="navbar-content">
                        <ul class="nav navbar-top-links">
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#">
                                    <i class="demo-pli-list-view"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links">
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="ic-user pull-right">
                                        <i class="demo-pli-male"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                    <ul class="head-list">
                                        <li>
                                            <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesion</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="boxed">
                <nav id="mainnav-container">
                    <div id="mainnav">
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                            
                                        <li class="list-header">Configuración</li>
                            
                                        <li>
                                            <a href="#">
                                                <i class="demo-pli-add-user"></i>
                                                <span class="menu-title">Usuario</span>
                                                <i class="arrow"></i>
                                            </a>
                            
                                            <ul class="collapse">
                                                <li><a href="index.php?default=4">Usuarios</a></li>
                                            </ul>
                                        </li>

                                        <li class="list-header">Clínicas</li>

                                        <li>
                                            <a href="#">
                                                <i class="demo-pli-receipt-4"></i>
                                                <span class="menu-title">Enfermería</span>
                                                <i class="arrow"></i>
                                            </a>
                                            
                                            <ul class="collapse">
                                                <li><a href="busqueda.php">Pacientes</a></li>
                                            </ul>
                                            <ul class="collapse">
                                                <li><a href="vacunas.php">Lista de vacunas</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="demo-pli-split-vertical-2"></i>
                                                <span class="menu-title">Reportes</span>
                                                <i class="arrow"></i>
                                            </a>
                            
                                            <ul class="collapse">
                                                <li><a href="reporte.php">Estado de proyectos</a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="demo-pli-question"></i>
                                                <span class="menu-title">Centro de Ayuda</span>
                                                <i class="arrow"></i>
                                            </a>
                            
                                            <ul class="collapse">
                                                <li><a href="index.php?default=1">Preguntas frecuentes</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="content-container">
                <div id="page-head">
                    <div id="page-title">
                        <h1 class="page-header text-overflow"><?php print $title; ?></h1>
                    </div><br><br><br>
                </div>
                <div id="page-content">

            <?php
        }
}

function draw_footer(){

    ?>
                </div>
            </div>
            <footer id="footer">
                <p class="pad-lft">&#0169; 2022 Clínicas Médicas</p>
            </footer>
        </div>
        
        <!--<script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/nifty.min.js"></script>-->
    </body>
    </html>
    <?php
}