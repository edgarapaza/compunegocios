$(document).ready(function(){
	$("#inputMargenGanancia").blur(function(){
		var precio = $("#inputPrecioUnitario").val();

		var margen = $("#inputMargenGanancia").val();

		var cal = (margen / 100) + 1;

		var pv = precio * cal;

		document.getElementById("inputPrecioVenta").value = pv.toFixed(2);
	});
});