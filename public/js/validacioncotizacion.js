var bn, bt, be;

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
}


validar();

/*****************************************/
function validarsend() {
    if (bn === true && bt === true && be === true ) {
        return true;

    } else {
        alert("La informacion no es valida");
        return false;
    }
}
/*************************************** */