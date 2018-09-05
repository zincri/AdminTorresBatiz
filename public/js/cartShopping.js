// var compras = 0;
$(".addToCart").click(() => {
    //$(".addToCart").prop("disabled", true);
    // $(".notificacionAddCart").css("top", "1%");
    // setTimeout(() => {
    //     $(".notificacionAddCart").css("top", "-35%");
    // }, 5000);
    // $(".shoppingCartItem span").css("visibility", "visible");

    // $(".shoppingCartItem span").text(compras += 1);



});


var hrefa = document.getElementById('hrefa');
if (document.getElementById('quantity')) {
    document.getElementById('quantity').addEventListener('input', function() {
        var id = $(this).data('id');
        campo = event.target;
        var cantidad = campo.value;
        if (cantidad == "" || cantidad == 0 || cantidad == null) {
            cantidad = 1;
        }
        var cadena = hrefa.href;
        cadena = cadena.substring(0, cadena.length - 1);
        cadena = cadena + cantidad;
        hrefa.setAttribute("href", cadena);
    });
}


$(".aquiestalaclase").on('click', function(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var href = $(this).data('href');
    var cantidad = $("#product_" + id).val();
    if (cantidad == "" || cantidad == 0 || cantidad == null) {
        cantidad = 1;
    }

    href = href.substring(0, href.length - 1);
    href = href + cantidad;
    window.location.href = href;
});

// btnEnviarCotizacion
// $(".btnEnviarCotizacion").click(() => {

//     if ($("input[name='correo']").val() != "" && $("input[name='nombre']").val() != "" && $("input[name='tel']").val() != "") {
//         $(".btnEnviarCotizacion").prop("disabled", true);
//         $(".notificacionAddCart").css("top", "1%");
//         setTimeout(() => {
//             $(".notificacionAddCart").css("top", "-35%");
//         }, 10000);
//         $(".groupCorreo p.small").css("color", "#707070");
//         $(".groupCorreo input").css("border-color", "#ced4da");
//         $(".groupNombre p.small").css("color", "#707070");
//         $(".groupNombre input").css("border-color", "#ced4da");
//         $(".groupTelefono p.small").css("color", "#707070");
//         $(".groupTelefono input").css("border-color", "#ced4da");
//     } else {
//         if ($("input[name='correo']").val() == "" && $("input[name='nombre']").val() == "" && $("input[name='tel']").val() == "") {
//             $(".groupCorreo p.small").css("color", "#dc3545");
//             $(".groupCorreo input").css("border-color", "#dc3545");
//             $(".groupNombre p.small").css("color", "#dc3545");
//             $(".groupNombre input").css("border-color", "#dc3545");
//             $(".groupTelefono p.small").css("color", "#dc3545");
//             $(".groupTelefono input").css("border-color", "#dc3545");
//         } else {
//             if ($("input[name='correo']").val() == "") {
//                 $(".groupCorreo p.small").css("color", "#dc3545");
//                 $(".groupCorreo input").css("border-color", "#dc3545");
//             } else if ($("input[name='nombre']").val() == "") {
//                 $(".groupNombre p.small").css("color", "#dc3545");
//                 $(".groupNombre input").css("border-color", "#dc3545");
//             } else if ($("input[name='tel']").val() == "") {
//                 $(".groupTelefono p.small").css("color", "#dc3545");
//                 $(".groupTelefono input").css("border-color", "#dc3545");
//             }

//         }


//     }


// });


$("#galeriaProducto img").on("click", function() {
    $(".imagenGrandeDescripcion").attr("src", $(this).attr('src'));
    $(window).scrollTop(0);
});