<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Compu Negocios</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <script src="../js/jquery-1.12.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body>

    <!-- HEADER-->
    <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="logo">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="../inicio.html">Compunegocios.net</a>
                            </div>
                    
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="../inicio.html">Inicio</a></li>
                                    
                                </ul>
                                <ul class="nav navbar-nav">
                                    
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes Listado <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listaVentas.php">Listado Ventas General</a></li>
                                            <li><a href="listaVentasFechas.php">Listado Ventas x Fecha</a></li>
                                            <hr>
                                            <li><a href="../reportes/reporte1.php" target="_blank" id="reporte1">R1-Rep por Familias</a></li>
                                            <li><a href="../reportes/reporte2.php" target="_blank" id="reporte2">R2-Producto y Stock</a></li>
                                            <li><a href="../reportes/reporte2.php" target="_blank" id="reporte3">R3-Ingresos diarios</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">Usuario: Julio Cesar Chipana Tello</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Configuración</a></li>
                                            <li><a href="../Controllers/sesion_close.php">Salir</a></li>
                                            
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div>
            </div>

            <div id="ventanas"></div>
    </div>