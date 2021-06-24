
    function consultar() {
    var documento = 'DNI';
    var usuario = '10447915125';
    var password = '985511933';
    var dni = $("#dni1").val();
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: 'https://www.facturacionelectronica.us/facturacion/controller/ws_consulta_rucdni_v2.php',
        data: {documento: documento, usuario: usuario, password: password, nro_documento: dni}
    })
            .done(function (data) {
                console.log(data.result);
                if(data.result.Materno!=null && data.result.Paterno!=null && data.result.Nombre!=null){

                    $("#dni1").val(data.result.DNI);
                    $("#dni1").prop("disabled", true);
                    //hidden
                    $("#dni").val(data.result.DNI);
                    $("#apellido").val(data.result.Paterno+" "+data.result.Materno);
                    $("#name").val(data.result.Nombre);
                    $("#apellido1").val(data.result.Paterno+" "+data.result.Materno);
                    $("#name1").val(data.result.Nombre);

                }else{
                    $("#dni1").val("");
                    $("#dni1").attr("placeholder","Intente nuevamente...");
                }

                //$("#fecha_nac").val(data.result.FechaNac);
               //$("#sexo").val(data.result.Sexo);



            })
            .fail(function (data) {
                //console.log(data);

            });
}
