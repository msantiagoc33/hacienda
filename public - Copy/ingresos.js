$(document).ready(function () {

    // Borro cualquier mensaje de error que hubiera anteriormente.
    $("#fechaSalida").focusin(function (event) {
        $("#mensage").html("");
        $("#fechaEntrada").css('background-color', 'white');
    });
    $("#fechaEntrada").focusin(function (event) {
        $("#mensage").html("");
    });
    $("#importe").focusin(function (event) {
        $("#mensage").html("");
        $("#fechaSalida").css('background-color', 'white');
    });


    // Comprueba que he seleccionado un concepto
    $("#nombre").focusout(function (event) {
        // La fechaEntrada es un string y la convierto a Date
        let concepto = $('#fechaEntrada').val();
        let entradaToFecha = new Date(entrada);

        let hoy = new Date();

        // La diferencia se calcula en segundos
        var dif = entradaToFecha.getTime() - hoy.getTime();

        if (dif < 0) {
            $("#fechaEntrada").css('background-color', 'red');
            $('#fechaEntrada').focus();
            $('#fechaEntrada').select();
        }
    });
    

    // Comprueba que la fecha de salida no se menor que la de entrada
    $("#fechaSalida").focusout(function (event) {
            let entrada = $('#fechaEntrada').val();
            let entradaToFecha = new Date(entrada);
            let salida  = $('#fechaSalida').val();
            let salidaToFecha = new Date(salida);

            if (salidaToFecha < entradaToFecha) {
                $("#fechaSalida").css('background-color', 'red');
                $("#mensage").html("La fecha de SALIDA no puede ser menor que la de ENTRADA");
                $('#fechaEntrada').focus();
                $('#fechaEntrada').select();
            }
    });

    // Comprueba que los huespedes no superen a 4 
    // Comprueba que haya seleccioando un huesped y una plataforma
    $("#huespedes").focusout(function (event) {
                let huespedes   = $('#huespedes').val();
                let huesped     = $('#cliente_id').val();
                let plataforma  = $('#plataforma_id').val();

                if (huespedes > 4) {
                    $("#mensage").html("ERROR !!! no se adminten más de 4 huespedes.");
                    $('#huespedes').focus();
                    $('#huespedes').select();
                }

                if (huesped == 0 || plataforma == 0) {
                    $("#mensage").html("ERROR !!! Seleccione antes un HUESPED y una PLATAFORMA.");
                    $('#huespedes').focus();
                    $('#huespedes').select();
                }
    });


    // Comprueba en cada pulsacion que solo introduzco numero y punto
    $('#importe').on('input', function () {
            this.value = this.value.replace(/[^0-9.]/g, '');
    });

    $('#huespedes').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
    });   
    
});
    