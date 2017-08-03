
$(document).ready(function(){

	$("#inputMargenGanancia").blur(function(){
		var precio = $("#inputPrecioUnitario").val();

		var margen1 = $("#inputMargenGanancia1").val();
		var margen2 = $("#inputMargenGanancia2").val();
		var margen3 = $("#inputMargenGanancia3").val();

		var cal1 = (margen1 / 100) + 1;
		var cal2 = (margen2 / 100) + 1;
		var cal3 = (margen3 / 100) + 1;

		var pv1 = precio * cal1;
		var pv2 = precio * cal2;
		var pv3 = precio * cal3;

		document.getElementById("inputPrecioVenta1").value = pv1.toFixed(2);
		document.getElementById("inputPrecioVenta2").value = pv2.toFixed(2);
		document.getElementById("inputPrecioVenta3").value = pv3.toFixed(2);
	});

});