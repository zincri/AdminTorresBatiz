// $(function() {
//     $.ajaxSetup({
//         headers: { 'X-CSRF-Token': $('#token').val() }
//     });
// });
// Add products functiontality

var temp = [];


$(".addProduct").click(function() {
    
    /*
    var validate = true;
    var nombre = $(this).parent().parent()[0].children[1].innerText;
    var idProducto = $(this).parent().parent()[0].children[0].innerText;
    for (var i = 0; i < temp.length; i++) {
        if (temp[i] == idProducto) {
            validate = false;
        }
    }
    if (validate == true) {
        temp.push(idProducto);
        $(".addedProducts tbody").append("<tr><td class='dontShow' name='idProducto'>" + idProducto + "</td><td name='nombreProducto'>" + nombre + "</td><td><input type='number' value='1' min='1' name='cantidad' id='cantidad'></td><td><button type='button' class='removeProduct'><i class='fa fa-times'></i></button></td></tr>");
    }
    */

});

// Remove products funtionality
$(document).on("click", ".removeProduct", function() {
    var idProductoR = $(this).parent().parent()[0].children[0].innerText;
    temp = $.grep(temp, function(value) {
        return value != idProductoR;
    });
    $(this).parent().parent()[0].remove();

});

$(".demo").click(function() {
    // console.log(temp);
    var objectProducts = {};
    var cantRows = $(".addedProducts tbody tr").length;
    for (var i = 1; i <= cantRows; i++) {
        objectProducts[i] = {
            "idProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(1)").text(),
            "nombreProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(2)").text(),
            "cantidadProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(3) input").val()
        }
    }
    var text = $('#file').val();
    text = text.substring(text.lastIndexOf("\\") + 1, text.length);
    console.log(text);
});
var id = 12; // A random variable for this example


$(function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $("#token").val() }
    });

    $('#promoForm').submit(function(event) {
        var nombrePromocion = $("input[name='nombrePromocion']").val();
        var imagenPromocion = $('#file').val();
        imagenPromocion = imagenPromocion.substring(imagenPromocion.lastIndexOf("\\") + 1, imagenPromocion.length);
        var objectProducts = {};
        var cantRows = $(".addedProducts tbody tr").length;
        for (var i = 1; i <= cantRows; i++) {
            objectProducts[i] = {
                "idProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(1)").text(),
                "nombreProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(2)").text(),
                "cantidadProducto": $(".addedProducts tbody tr:nth-of-type(" + i + ") td:nth-of-type(3) input").val()
            }
        }

        event.preventDefault();

        var formId = '#promoForm';
        // $.post($(formId).attr('action'), { 'nombrePromocion': nombrePromocion, 'imagenPromocion': imagenPromocion, 'productosAsociados': objectProducts });

        $.ajax({
            url: $(formId).attr('action'),
            type: $(formId).attr('method'),
            data: { 'nombrePromocion': nombrePromocion, 'imagenPromocion': imagenPromocion, 'productosAsociados': objectProducts },
            dataType: 'html',
            success: function(result) {
                alert("Excelete " + this.data);
            },
            error: function() {
                alert("Error " + this.data);
                console.log('Error');
            }
        });
    });

});