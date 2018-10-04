$(document).ready(function(){

    var temp = [];
    var validate= false;
    $(".addProduct").click(function() {
        var nombre = $(this).parent().parent()[0].children[1].innerText;
        var idProducto = $(this).parent().parent()[0].children[0].innerText;
        console.log(nombre);
        idProducto=parseInt(idProducto);
        
        for (var i = 0; i < temp.length; i++) {
            if (temp[i] == idProducto) {
                validate = true;
                break;
            }
            else{
                validate = false;
            }
        }
        if(validate == false){
            temp.push(idProducto);
            $(".addedProducts").append("<tr><td class='dontShow' name='idProducto'>" + idProducto + "</td><td name='nombreProducto'>" + nombre + "</td><td><input type='number' value='1' min='1' name='cantidad' id='cantidad'></td><td><button type='button' class='removeProduct'><i class='fa fa-times'></i></button></td></tr>");
        }
        
    });

});