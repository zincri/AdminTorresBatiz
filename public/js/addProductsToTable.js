// Add products functiontality
$(document).ready(() => {
    var temp = [];
    if ($(".partProductsAdded > *").length == 0) {
        // alert("hola");
        var temp = [];
    } else {


        for (var i = 1; i <= $(".partProductsAdded > *").length; i++) {
            temp.push($(".partProductsAdded > div:nth-of-type(" + i + ")").attr('inserted'));
            console.log(temp[i]);
        }
    }

    var validate = false;
    $(".addProduct").click(function() {
        var nombre = $(this).parent().parent()[0].children[1].innerText;
        var idProducto = $(this).parent().parent()[0].children[0].innerText;
        console.log(nombre);
        idProducto = parseInt(idProducto);

        for (var i = 0; i < temp.length; i++) {
            if (temp[i] == idProducto) {
                validate = true;
                break;
            } else {
                validate = false;
            }
        }
        if (validate == false) {
            temp.push(idProducto);
            $(".partProductsAdded").append("<div inserted='" + idProducto + "' class='form-group {{$errors->has('productAdded') ? 'has-error':''}}'><div class='col-md-6'><div class='input-group'><span class='input-group-addon'><span class='fa fa-pencil'></span></span><input type='hidden' name='idProduct[]' value=" + idProducto + "><input readonly type='text' value='" + nombre + "' class='form-control' name='productAdded[]'/></div></div><div class='col-md-3'><div class='input-group'><span class='input-group-addon'><span class='fa fa-pencil'></span></span><input placeholder='cantidad' min='1' type='number' class='form-control' name='cantidad[]'/></div></div><div class='col-md-2'><button type='button' data='" + idProducto + "' class='removeProduct'><i class='fa fa-times'></i></button></div></div>");
        }

    });

    // Remove products funtionality


    $(document).on("click", ".removeProduct", function() {
        var idProductoR = $(this).attr('data');
        temp = $.grep(temp, function(value) {
            return value != idProductoR;
        });
        $("div[inserted = '" + idProductoR + "']").remove();
    });
});