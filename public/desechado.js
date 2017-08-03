$(document).ready(function(){

            $("#btnGuardarFamilia").click(function(){

                var micodigo = document.getElementById('inputCodigo').value;
                var mifam    = document.getElementById('inputFamiliainterna').value;

                var btnGuardarFamilia = $("#btnGuardarFamilia");
                var param1 = {
                                "micodigo" : micodigo,
                                "mifam"   : mifam
                            };

                $.ajax({
                    data : param1,
                    url  : 'Controllers/nuevaFamilia.controller.php',
                    type : 'POST',
                    beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                    },
                    success:  function (data) {
                        alert("Guardado");
                    },
                    error:function(data){
                        alert("Problemas al tratar de registrar el formulario");
                    }
                });

                // Nos permite cancelar el envio del formulario
                return false;
            });


	$("#btnregistrar").on("submit",function(){

        // Capturamnos el boton de envío
        var btnregistrar = $("#btnregistrar");

        $.ajax({
            type: 'post',
            url: '../../public/Controllers/nuevoProducto.php',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button <button></button>
                btnregistrar.val("Enviando"); // Para input de tipo button
                btnregistrar.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnregistrar.val("registrar formulario");
                btnregistrar.removeAttr("disabled");
            },
            success:function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                $(".respuesta").html(data);
                alert("Guardado con Exito");

            },
            error:function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                document.getElementById("msg").innerHTML = "Error en el ingreso";
            }
        });

        // Nos permite cancelar el envio del formulario
        return false;

    });


	$("#btnguardar").on('submit', function (e) {
        $.ajax(
            {
                type: 'post',
                url: '../../Controllers/nuevoProducto.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    if (response.success)
                    {
                        alert("Guardar Nuevo Usuario");
                    }
                    else
                    {
                        alert("Error al insertar Nuevo Usuario");
                    }
                }
            }
        );
		e.preventDefault();
	});

    $("#btnNuevaMarca").on('submit', function (e) {
        var btnNewMarca = $("#btnNuevaMarca");
        $.ajax(
            {
                type: 'post',
                url:  '../../Controllers/nuevaMarca.php',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend:function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button <button></button>
                btnNewMarca.val("Enviando"); // Para input de tipo button
                btnNewMarca.attr("disabled","disabled");
                },
                complete:function(data){
                    /*
                    * Se ejecuta al termino de la petición
                    * */
                    btnNewMarca.val("Registrar formulario");
                    btnNewMarca.removeAttr("disabled");
                },
                success: function(data){
                    if (data.success)
                    {
                        $("#respuesta").attr("display","block");
                        $("#respuesta").html(data);
                    }
                    else
                    {
                        alert("Error al insertar Marca");
                    }
                }
            }
        );
        e.preventDefault();
    });


});