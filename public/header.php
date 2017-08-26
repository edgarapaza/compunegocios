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

        <style type="text/css">
             #logo{
            background-color: #D7263D;
            color: white;
            font-size: 35px;
            font-weight: bold;
            height: 60px;
            margin-bottom: 10px;
        }
        </style>
    </head>
    <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="logo">
                <em>Compunegocios.net</em>
            </div>
        </div>
    </div>

    <div class="container-fluid">

      <!-- Static navbar -->
      <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Panel Principal</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Inicio</a></li>
              <li><a href="#">Productos</a></li>
              <li><a href="#">Contactos</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Mapa del sitio</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


      <div class="container">
        <div class="row">
        <div id="ventanas">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="img/silder1.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Plataforma de Registro</h1>
                                    <p></p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Suscribete hoy</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="img/silder2.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1>Ultimas Laptops</h1>
                                    <p></p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mas</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="img/slider3.jpg">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1></h1>
                                    <p></p>
                                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver Galeria</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>


            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h3>Intel Core i9, más potentes, más eficientes... primeros benchmarks</h3>
                <p> Los Core i9 serían los <strong>Gulftown en 32 nanómetros</strong> ahora hay que añadir unas pruebas de rendimiento y potencia, reales y bajo procesadores que, aunque quizá no sean las versiones finales, sí son modelos en un estado de desarrollo muy avanzado.
                <br>

                Hablamos por supuesto de un Core i9 de seis núcleos, emulando hasta 12 hilos de ejecución (la tecnología hyperthreading de los i7) y todo funcionando a 2.8 GHz. y con el proceso de fabricación de 32 nanómetros. Lo más sorprendente es ver que en algunos tests ha logrado un rendimiento hasta un 50% mayor que los i7.

                </p>
            </div>

        </div>
        </div>
    <br>
    <hr>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Novedades Tecnologicas</h3>
      </div>
      <div class="panel-body">

        <img src="img/ia.png" class="rounded float-left mx-auto d-block" alt="..." hspace="5" vspace="5" style="float: right;">
        <p>La inteligencia artificial (IA) ya no es un tema propio de la ciencia ficción. El 2017 marcará la consolidación de una tecnología que se hará presente mediante asistentes cada vez más sofisticados en el celular y sistemas avanzados capaces de brindar recomendaciones en sectores como la salud, la agricultura y el área del transporte. El mercado mundial de robótica e IA se valora en 153.000 millones de dólares para 2020, según Intel.  <br>
        En la salud será cada vez más común que los médicos apoyen sus diagnósticos con los análisis de una máquina capaz de evaluar múltiples opciones de tratamiento y sus posibles consecuencias, según IBM.<br>

        En la agricultura se optimizará el uso de recursos naturales y se mejorará la calidad de los productos cosechados gracias al análisis de datos.<br>

        En el sector de transporte, los carros autónomos ganarán fuerza. Uber continuará trabajando en su flota de automóviles sin conductor y cabe prever que varias marcas, como Toyota, Audi, Mercedes-Benz, BMW, Tesla y Ford presenten sus propuestas.</p>
      </div>
    </div>

    </div>

    </div> <!-- /container -->