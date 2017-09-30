
<script type="text/javascript">
	$(function(){
		$("#buscarserie").on("click", function(){
          $("#principal").load("buscarxserie.php");
      });
    $("#linkproductos").on("click", function(){

        	$("#principal").load("listaProductos.php");
    	});

    $("#linkpersonal").on("click", function(){
          $("#principal").load("listaPersonal.php");
      });
	});
</script>
<h1>Listado</h1>
  <ul>
    <li><a href="buscarxserie.php" id="buscarserie" target="_blank">Buscar x Serie</a></li>
    <li><a href="#" id="linkproductos">Productos</a></li>
    <li><a href="#" id="linkfamilias">Familias</a></li>
    <li><a href="#" id="linkmarcas">Marcas</a></li>
    <li><a href="#" id="linkpersonal">Personal</a></li>
  </ul>


	<div id="principal"></div>
