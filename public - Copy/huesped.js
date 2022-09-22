$(document).ready(function () {

    // Comprueba que he seleccionado un concepto
    $("#nombreHuesded").focusout(function (event) {
        let concepto = $('#pais_id').val();
        if (concepto == 0) {
            $("#mensage").css('background-color', 'red');
            $("#mensage").html("Tiene que seleccionar un PAIS")
            $('#pais_id').focus();
            $('#pais_id').select();
        }else{
            $("#mensage").html("");
        }
    });  
    
});
    