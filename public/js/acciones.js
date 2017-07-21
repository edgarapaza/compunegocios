$(document).ready(function(){
    /*************************************************************
    *****  Llamada a Botones *******************
    ***********************************************************/
    $("#btnNewProveedor").on("click", function(){
        $("#eventos").load("../nuevoProveedor.html");
    });

    $("#btnNuevaMarca").on("click", function(){
        $("#eventos").load("../nuevaMarca.html");
    });

    $("#btnnewfamilia").on("click", function(){
        $("#eventos").load("../newFamilia.html");
    });


    /*************************************************************
    *****  Botones de guardado *******************
    ***********************************************************/
    $("#btnNewFamilia").on("submit",function(){

        // Capturamnos el boton de envío
        var btnNewFamilia = $("#btnNewFamilia");

        $.ajax({
            type: 'post',
            url: '../../public/Controllers/nuevaFamilia.controller.php',
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function(){
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button <button></button>
                btnNewFamilia.val("Enviando"); // Para input de tipo button
                btnNewFamilia.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnNewFamilia.val("registrar formulario");
                btnNewFamilia.removeAttr("disabled");
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
                alert("Problemas al tratar de registrar el formulario");
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