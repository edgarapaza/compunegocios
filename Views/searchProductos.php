<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){


			$("#elemento1").click(function(){
			   alert("press");
			  var idprod   = $("#idprod").val();
			  
			  var parametros = {
					"id"	: idprod
				};
				$.ajax({
					data: parametros,
					url : '../Controllers/paquete.controller.php',
					type: 'POST',
					success: function(res){
						$("#display2").html(res);
					},
					
					error: function(response){
						$("#display2").html("Error " + response);
					}
				})

			});


			return false;
		});

	</script>
<?php
require_once "../Models/Conexion.php";

$link = new Conexion();
$conn = $link->Conectarse();


	if($_POST)
	{

		$q=$_POST['palabra'];//se recibe la cadena que queremos buscar
		
		$sql_res = $conn->query("SELECT idproducto, descripcion, numserie, modelo FROM productos WHERE descripcion LIKE '%$q%';");

		while($row=$sql_res->fetch_array(MYSQLI_ASSOC))
		{
			$id     = $row['idproducto'];
			$nombre = $row['descripcion'];
			$numserie  = $row['numserie'];
			$foto   = $row['modelo'];

	?>
	<a href="../Controllers/paquete.controller.php?id=<?php echo $id; ?>" style="text-decoration: none;" id="ELEMENTO" >
			<input type="hidden" id="idprod" value="<?php echo $id; ?>">
			<div class="display_box" align="left">
				<div style="margin-right:6px;"><b><?php echo $nombre; ?></b></div>
				<div style="margin-right:6px; font-size:16px;" class="desc"><?php echo $numserie; ?></div>
			</div>
	</a>
		
	
		
	<?php
		}

	}
	else
	{

	}

?>
