$(".addPhones").click(() => {
    $(".secondPhonesContainer").append("<div class='form-group {{$errors->has('secondPhone') ? 'has-error':''}}'><label class='col-md-3 col-xs-9 control-label'>Teléfono Secundario</label><div class='col-md-4 col-xs-9'><div class='input-group'><span class='input-group-addon'><span class='fa fa-pencil'></span></span><input type='text' class='form-control' name='secondPhone[]'  /></div></div><div class='col-md-2'><button type='button' class='removeProduct'><i class='fa fa-times'></i></button></div></div>");
});

$(document).on("click", ".removeProduct", function() {
    $(this).parent().parent().prop("hidden", true);
    $(this).parent().parent().remove();
});