$(document).ready(function () {

	$("#btnIngreso").on("click", function(){
        // Capturamnos el boton de envío
        var btnIngreso = $("#btnIngreso");

        $.ajax({
            type: 'post',
            url: '../Controllers/login.controller.php',
            data: $(this).serialize(),
            dataType: 'json',

            success:function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                alert("bien");

            },
            error:function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                document.getElementById("msg").innerHTML = "Error ingresando";

            }
        });

        // Nos permite cancelar el envio del formulario
        return false;

    });

});

