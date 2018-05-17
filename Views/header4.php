<?php
session_start();
if(isset($_SESSION['administrador']))
{
  require_once "../Models/personal.class.php";
  $idpersonal = $_SESSION['administrador'];

  $per = new Personal();
  $dat = $per->NombreTrabajador($idpersonal);
?>
<!doctype html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-06 16:27:42 +0200 -->
    <title>CompuNegocios.net</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <img src="img/solotexto200x61.png" class="header-brand-img" alt="tabler logo">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="nav-item d-none d-md-flex">
                  
                </div>
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo $dat[3]; ?>)"></span>
                      <span class="ml-2 d-none d-lg-block">
                        <span class="text-default"><?php echo $dat[0].' '.$dat[1];?></span>
                        <small class="text-muted d-block mt-1"><?php echo $dat[2]; ?></small>
                      </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Perfil
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Configuración
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Mensajes
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Necesitas ayuda?
                    </a>
                    <a class="dropdown-item" href="../Controllers/sesion_close.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Salir
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Buscar&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Ingresos</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./nuevoProveedor.php" class="dropdown-item ">Nuevo Proveedor</a>
                      <a href="./nuevoAlmacen.php" class="dropdown-item ">Nuevo Almacen</a>
                      <a href="./newFamilia.php" class="dropdown-item ">Nueva Familia</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Ventas</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./productos_listado.php" class="dropdown-item ">Ventas</a>
                      <a href="./moveralmacen.php" class="dropdown-item ">Mover Almacen</a>
                      <a href="./regCambiosAlmacen.php" class="dropdown-item ">Reg. Cambios de Almacen</a>
                      
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Listados</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./listaProveedor.php" class="dropdown-item ">Proveedor</a>
                      <a href="./listaAlmacen.php" class="dropdown-item ">Almacenes</a>
                      <a href="./listaCliente.php" class="dropdown-item ">Clientes</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="./productos_listado.php" class="nav-link"><i class="fe fe-check-square"></i> Buscador</a>
                  </li>
                  <li class="nav-item">
                    <a href="./stock.php" class="nav-link"><i class="fe fe-image"></i> Compras</a>
                  </li>
                  

                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Reportes</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="../reportes/reporte1.php" target="_blank" class="dropdown-item ">Ventas General</a>
                      <a href="../reportes/reporte2.php" target="_blank" class="dropdown-item ">Ventas x Fecha</a>
                      <a href="../reportes/reporte3.php" target="_blank" class="dropdown-item ">Reporte Ventas del Dia</a>
                      
                      <div class="dropdown-divider"></div>
                      <a href="personalizarReport.php" target="_blank" class="dropdown-item ">Personalizar Reportes</a>

                    </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Herramientas</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="./nuevoPersonal.php" class="dropdown-item ">Nuevo Personal</a>
                        <a href="./listaPersonal.php" class="dropdown-item ">Listado de Personal</a>
                      </div>
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">

<?php 
}
else{
  echo "Error: 404.  Consulte al administrador del sistema";
  header("Location: ../index.html");
} 
?>