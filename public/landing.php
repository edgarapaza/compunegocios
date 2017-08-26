<?php
session_start();
if(isset($_SESSION['administrador'])){

include_once "headerLogin.php";
@$msg = $_REQUEST['msg'];
if($msg == ""){

}else{
	echo "<script type='text/javascript'>alert('". $msg."');</script>";
}

?>

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
	</div>

<?php include_once "footer.php";
}else{
	header("Location: index.php");
}
?>