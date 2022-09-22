$(document).ready(function () {

    // Comprueba que he seleccionado un concepto
    $("#fecha").focusout(function (event) {
        let concepto = $('#concepto_id').val();
        if (concepto == 0) {
            $("#mensage").css('background-color', 'red');
            $("#mensage").html("Tiene que seleccionar un cocepto de gasto")
            $('#concepto_id').focus();
            $('#concepto_id').select();
        }else{
            $("#mensage").html("");
        }
    });  
    
});
    