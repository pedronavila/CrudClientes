$(function(){
    $("#btnGuardar").prop("disabled",true);
    
    $("#Nombre").validateNumLetter(' abcdefghijklmnñopqrstuvwxyzáéíóú');
    $("#Edad").validateNumLetter('0123456789');
    $("#idCiudad").validateNumLetter('0123456789');

    //valida lo tecleado en RFC
    $("#RFC").keypress(function(event){
        var exp;
        if($("#RFC").val().length<4){
            exp = new RegExp("^[A-Z,Ñ]$");
        }
        else{
            exp = new RegExp("^[0-9]$");
        }
        if(!exp.test(String.fromCharCode(event.which)) || $("#RFC").val().length>9){
            return false
        }
        //validaCamposVacios();
    });

    $("#Edad").keypress(function(event){
        if($("#Edad").val().length>1){
            return false
        }
    });

    //niega paste
    $("#RFC").on('paste', function(e){
        e.preventDefault();
    });
    $("#Nombre").on('paste', function(e){
        e.preventDefault();
    });
    $("#Edad").on('paste', function(e){
        e.preventDefault();
    });
    $("#idCiudad").on('paste', function(e){
        e.preventDefault();
    });

    $("#RFC").keyup(function () {
        validaCamposVacios();
    });
    $("#Nombre").keyup(function () {
        validaCamposVacios();
    });
    $("#Edad").keyup(function () {
        validaCamposVacios();
    });
    $("#idCiudad").keyup(function () {
        validaCamposVacios();
    });

    function validaCamposVacios(){
        if($("#RFC").val().length==10 && $.trim($("#Nombre").val()).length>0 && $("#idCiudad").val().length>0 && $("#Edad").val().length>0){
            $("#btnGuardar").prop("disabled",false);
            return;
        }
        $("#btnGuardar").prop("disabled",true);
    }
});