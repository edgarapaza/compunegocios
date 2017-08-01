<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Compu Negocios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fira.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- Latest compiled and minified JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <style>
        @font-face{
            font-family: 'Fira Sans';
            src: url('../fonts/eot/FiraSans-Light.eot');
            src: url('../fonts/eot/FiraSans-Light.eot') format('embedded-opentype'),
                 url('../fonts/woff2/FiraSans-Light.woff2') format('woff2'),
                 url('../fonts/woff/FiraSans-Light.woff') format('woff'),
                 url('../fonts/ttf/FiraSans-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }
        body {
            font-family: 'Fira Sans';
            font-weight: 300;
            overflow-x: hidden;



            color: black;
        }
        article {
            margin: 0 auto;
            max-width: 800px;
            padding: 1em;
        }
        h1, .glyph {
            font-family: 'Fira Sans';
            font-size: 18px;
        }
        p {
            font-family: 'Fira Sans';
            font-size: 18px;
            padding: 0 1em;
        }
        form{
            font-family: 'Fira Sans';
            font-size: 18px;
            padding: 0 1em;
        }
        legend{

            font-family: 'Fira Sans';
            font-weight: bold;
            font-size: 20px;
            border-bottom: 1px solid gray;
            color: #F0B200;

        }

        @media (max-width: 640px) {
            p {
                padding: 0;
                font-size: 18px;
            }
        }

        #logo{
            background-color: #F99F4D;
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
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

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
                        <a href="nuevoProducto.php">Nuevo producto</a>
                    </li>
                    <li>
                        <a href="listado.php">Listado</a>
                    </li>

                    <li>
                        <a href="Controllers/sesion_close.php" id="login">Cerrar Sesion</a>
                    </li>

                  </ol>


            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/acciones.js"></script>