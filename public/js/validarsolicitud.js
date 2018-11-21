var bn, bt, be, bm;

function validar() {



    /**Validacion nombre */
    document.getElementById('nombre').addEventListener('input', function() {
        campo = event.target;

        nombreRegex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ´'.]+$/i;

        if (nombreRegex.test(campo.value) && campo.value.length < 49) {
            $(".nombreGroup").addClass("inputValido");
            $(".nombreGroup").removeClass("inputInvalido");
            bn = true;
        } else {
            $(".nombreGroup").addClass("inputInvalido");
            $(".nombreGroup").removeClass("inputValido");
            bn = false;
        }
    });
    $("input[name='nombre']").bind('keypress', function(event) {
        var eventCode = !event.charCode ? event.which : event.charCode;
        if ((eventCode >= 37 && eventCode <= 40) || eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
            return;
        }
        var regex = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ. ´'.]+$");
        var key = String.fromCharCode(eventCode);
        if (!regex.test(key)) {
            event.preventDefault();
            $(".nombreGroup").addClass("inputInvalido");
            setTimeout(function() {
                $(".nombreGroup").removeClass("inputInvalido");
                bn = false;
            }, 1000);

            return false;
        } else {
            $(".nombreGroup").addClass("inputValido");
            $(".nombreGroup").removeClass("inputInvalido");
            bn = true;

        }
    });



    /** Validacion mensaje */
    document.getElementById('mensaje').addEventListener('input', function() {
        campo = event.target;

        mensajeRegex = /[-a-zA-Z0-9@:%._\+~#=]/i;

        if (mensajeRegex.test(campo.value) && campo.value.length < 1499) {
            $(".mensajeGroup").addClass("inputValido");
            $(".mensajeGroup").removeClass("inputInvalido");
            bm = true;
        } else {
            $(".mensajeGroup").removeClass("inputValido");
            $(".mensajeGroup").addClass("inputInvalido");
            bm = false;
        }
    });


    /**Validacion telefono */
    document.getElementById('telefono').addEventListener('input', function() {
        campo = event.target;
        valido = document.getElementById('telefonoOK');

        telefonoRegex = /^([0-9])*$/i;

        if (telefonoRegex.test(campo.value) && campo.value.length < 20 && campo.value.length > 7) {
            $(".telefonoGroup").addClass("inputValido");
            $(".telefonoGroup").removeClass("inputInvalido");
            bt = true;
        } else {
            $(".telefonoGroup").removeClass("inputValido");
            $(".telefonoGroup").addClass("inputInvalido");
            bt = false;
        }
    });
    $("input[name='telefono']").bind('keypress', function(event) {
        var eventCode = !event.charCode ? event.which : event.charCode;
        if ((eventCode >= 37 && eventCode <= 40) || eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
            return;
        }
        var regex = new RegExp("^([0-9])*$");
        var key = String.fromCharCode(eventCode);
        if (!regex.test(key)) {
            event.preventDefault();
            $(".telefonoGroup").addClass("inputInvalido");
            setTimeout(function() {
                $(".telefonoGroup").removeClass("inputInvalido");
                bn = false;
            }, 1000);

            return false;
        } else {
            $(".telefonoGroup").addClass("inputValido");
            $(".telefonoGroup").removeClass("inputInvalido");
            bn = true;

        }
    });

    /* Validacion email*/
    document.getElementById('email').addEventListener('input', function() {
        campo = event.target;
        valido = document.getElementById('emailOK');

        emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

        if (emailRegex.test(campo.value) && campo.value.length < 49) {
            $(".correoGroup").addClass("inputValido");
            $(".correoGroup").removeClass("inputInvalido");
            be = true;
        } else {
            $(".correoGroup").removeClass("inputValido");
            $(".correoGroup").addClass("inputInvalido");
            be = false;
        }
    });

    // Validar tamaño de hoja
    $(document).on('change', '#hojaSize', function(e) {
        // console.log(this.options[e.target.selectedIndex].value);
        var idPaquete = this.options[e.target.selectedIndex].value;

        if (idPaquete != 0) {
            $(".selectContainer").addClass("inputValido");
            $(".selectContainer").removeClass("inputInvalido");
        } else {
            $(".selectContainer").removeClass("inputValido");
            $(".selectContainer").addClass("inputInvalido");
        }

    });


    /* validar VOLUMEN*/
    document.getElementById('volumen').addEventListener('input', function() {
        campo = event.target;


        volumenRegex = /^([0-9])*$/i;

        if (volumenRegex.test(campo.value) && campo.value.length > 0 && campo.value.length < 8 && campo.value != "") {
            $(".volumenGroup").addClass("inputValido");
            $(".volumenGroup").removeClass("inputInvalido");
            bv = true;
        } else {
            $(".volumenGroup").removeClass("inputValido");
            $(".volumenGroup").addClass("inputInvalido");
            bv = false;
        }
    });
    $("input[name='volumen']").bind('keypress', function(event) {
        var eventCode = !event.charCode ? event.which : event.charCode;
        if ((eventCode >= 37 && eventCode <= 40) || eventCode == 8 || eventCode == 9 || eventCode == 46) { // Left  / Right Arrow, Backspace, Delete keys
            return;
        }
        var regex = new RegExp("^([0-9])*$");
        var key = String.fromCharCode(eventCode);
        if (!regex.test(key)) {
            event.preventDefault();
            $(".volumenGroup").addClass("inputInvalido");
            setTimeout(function() {
                $(".volumenGroup").removeClass("inputInvalido");
                bn = false;
            }, 1000);

            return false;
        } else {
            $(".volumenGroup").addClass("inputValido");
            $(".volumenGroup").removeClass("inputInvalido");
            bn = true;

        }
    });

}





validar();

/*****************************************/
function validarsend() {
    if (bn === true && bt === true && be === true && bm === true && bv === true) {
        return true;

    } else {
        alert("La informacion no es valida");
        return false;
    }
}
/*************************************** */