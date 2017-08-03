
<script type="text/javascript">
	$(document).ready(function(){
		$("#linkproductos").on("click", function(){
        	$("#principal").load("../listaProductos.php");
    	});

    $("#linkpersonal").on("click", function(){
          $("#principal").load("../listaPersonal.php");
      });
	});
</script>
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Listado
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#" id="linkproductos">Productos</a></li>
    <li><a href="#" id="linkfamilias">Familias</a></li>
    <li><a href="#" id="linkmarcas">Marcas</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#" id="linkpersonal">Personal</a></li>
  </ul>
</div>

	<div id="principal"></div>
