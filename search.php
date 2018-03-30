<?php
include('Models/Conexion.php');
$conn = new Conexion();
$link = $conn->Conectarse();

if($_POST)
{

	$conta = $_POST['id'] + 1;
	echo "Conta llegado: ". $conta;

	$q = $_POST['palabra'];//se recibe la cadena que queremos buscar
 	$sql = "SELECT IDproducto AS id, producto, modelo, descripcion FROM productos WHERE producto LIKE '%$q%' OR numserie LIKE '%$q%';";
	$res = $link->query($sql);

	while($row = $res->fetch_array(MYSQLI_ASSOC))
	{
		$id=$row['id'];
		$nombre=$row['producto'];
		$descp=$row['descripcion'];
		$modelo=$row['modelo'];

?>
	<a href="ventas.php?id=<?php echo $id;?>&conta=<?php echo $conta;?>" style="text-decoration:none;" >
		<div class="display_box" align="left">
			<div style="float:left; margin-right:6px;"> <?php echo $nombre;?>
			</div> 
			<div style="margin-right:6px;"><b><?php echo $modelo; ?></b></div>
			<div style="margin-right:6px; font-size:12px;" class="desc"><?php echo $descp; ?></div>
		</div>
	</a>

<?php
	}
	
	mysqli_close($link);

}
else
{
	$conta = 0;
}

?>
