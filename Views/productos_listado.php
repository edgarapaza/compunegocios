<?php 
include "header.php";

require_once "../Models/articulos.model.php";
require_once "../Models/familiaslistado.model.php";

$articulo = new ArticulosAlmacen();

if(isset($_REQUEST['btnBuscar'])){
	echo "presional boton";
	$busq1 = $_REQUEST['search1'];
	$busq2 = $_REQUEST['search2'];

	printf("Dato 1: %s  --- Dato Serie: %s", $busq1, $busq2);

	$dataaaa = $articulo->ListaMarcaProd($busq1, $busq2);

}

@$id = $_REQUEST['id'];
$dat = $articulo->ListaArticulos($id);
$fam = new FamiliasLista();
$data2 = $fam->FamiliasListado();


?>
<div class="container">
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

			<h3>Buscador</h3>

			<form action="" method="POST" class="form-inline" role="form">
			
				<div class="form-group">
					<label class="sr-only" for="">label</label>
					<input type="text" class="form-control" id="" placeholder="Buscar">
				</div>
			
				<div class="form-group">
					<label for="inputSearch-Form" class="col-sm-2 control-label">Opc:</label>
					<div class="col-sm-2">
						<select name="search-form" id="inputSearch-Form" class="form-control" required="required">
							<option value="">Descripcion</option>
							<option value="">Familia</option>
							<option value="">Serie</option>
						</select>
					</div>
				</div>
			
				<button type="button" class="btn btn-primary">Buscar</button>

			</form>

			<div id="familias">
				<label class="col-sm-2 control-label">Familias:</label>
				<br>
				<ul class="form-group">
					<li><a href="productos_listado.php?id=1000">Todos</a></li>
					<?php 
					
					while ($fila2 = $data2->fetch_array()) {
						echo "<li> <a href='productos_listado.php?id=".$fila2[0]."'>". $fila2[2] ." </a>
							</li>";
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<form action="" method="POST" class="form-inline" role="form" name="search_datos">
			
				<div class="form-group">
					<label class="sr-only" for="">label</label>
					<input type="text" class="form-control" name="search1" id="search1" placeholder="Buscar">
					<input type="text" class="form-control" name="search2" id="search2" placeholder="Buscar Serie">
				</div>
			
				<button type="submit" class="btn btn-primary" name="btnBuscar" id="btnBuscar">Submit</button>
			</form>

			<table class="table table-hover table-responsive">
				<thead>
					<tr class="bg-danger">
						<th>Codigo</th>
						<th>Fam.</th>
						<th>Descripcion</th>
						<th>Precio1</th>
						<th>Precio2</th>
						<th>Precio3</th>
						<th>Stock Total</th>
						
					</tr>
				</thead>
				<?php
				

				while ($fila = $dat->fetch_array(MYSQLI_ASSOC)) {
					//p.idproducto, f.familia, p.descripcion, p.precventa1, p.precventa2, p.precventa3, p.stocktotal
				 ?>
				<tbody>
					<tr>
						<td><?php echo $fila['idproducto']; ?></td>
						<td><?php echo $fila['codigo']; ?></td>
						<td><?php echo $fila['descripcion']; ?></td>
						
						<td align="right"><?php printf("S/. %.2f",$fila['precventa1']); ?></td>
						<td align="right"><?php printf("S/. %.2f",$fila['precventa2']); ?></td>
						<td align="right"><?php printf("S/. %.2f",$fila['precventa3']); ?></td>
						<td align="center"><?php echo $fila['stocktotal']; ?></td>
						<td>
							
						</td>

						<td>
							<a href="venta2.php?idprod=<?php echo $fila['idproducto']; ?>" class="btn btn-success">Vender</a>
							
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>

		</div>
	</div>
</div>
