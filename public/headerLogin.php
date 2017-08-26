<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Compu Negocios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/acciones.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>


        #logo{
            background-color: #A32222;
            color: white;
            font-size: 35px;
            font-weight: bold;
            height: 60px;
            margin-bottom: 10px;
        }

        #dropdownMenu1{
            position: relative;
        }

    </style>

    <script type="text/javascript">
        $(function(){
            $("#producto").on("click", function(){
                $("#ventanas").load("../nuevoProducto.php");
            });
            $("#proveedor").on("click", function(){
                $("#ventanas").load("nuevoProveedor.html");
            });
            $("#familia").on("click", function(){
                $("#ventanas").load("newFamilia.html");
            });
            $("#subfamilia").on("click", function(){
                $("#ventanas").load("newSubFamilia.php");
            });
            $("#marca").on("click", function(){
                $("#ventanas").load("nuevaMarca.html");
            });
            $("#almacen").on("click", function(){
                $("#ventanas").load("nuevoAlmacen.php");
            });

            $("#personal").on("click", function(){
                $("#ventanas").load("nuevoPersonal.php");
            });
            $("#listado").on("click", function(){
                $("#ventanas").load("listado.php");
            });


        });
    </script>

    </head>
    <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="logo">

                <em>Compunegocios.net</em>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                  <ol class="breadcrumb">
                    <li>
                        <a href="landing.php">Home</a>
                    </li>
                    <li>
                        <a href="#" id="producto">Nuevo producto</a>
                    </li>
                    <li>
                        <a href="#" id="proveedor">Nuevo Proveedor</a>
                    </li>
                    <li>
                        <a href="#" id="familia">Nueva Familia</a>
                    </li>
                    <li>
                        <a href="#" id="subfamilia">Nueva Sub Familia</a>
                    </li>
                    <li>
                        <a href="#" id="marca">Nueva Marca</a>
                    </li>
                    <li>
                        <a href="#" id="almacen">Nuevo Almacen</a>
                    </li>
                    <li>
                        <a href="#" id="personal">Nuevo Personal</a>
                    </li>
                    <li>
                        <a href="#" id="listado">Listado</a>
                    </li>

                    <li>
                        <a href="Controllers/sesion_close.php" id="login">Cerrar Sesion</a>
                    </li>

                  </ol>


            </div>
        </div>
    </div>

