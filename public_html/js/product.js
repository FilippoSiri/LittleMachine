function updateCartFun(result){
    if(result.result){
        $("#avvisoerrore").attr("hidden", true);
        if(document.getElementById("cart-icon").classList.contains("animazione"))
            document.getElementById("cart-icon").classList.remove("animazione");
        document.getElementById("cart-icon").offsetWidth;
        document.getElementById("cart-icon").classList+=" animazione";
    }else
        $("#avvisoerrore").attr("hidden", false);
}

$(document).ready(function (){
    $("#product").submit(function (e){
        var id = $("#idP").val();
        var qta = $("#qta").val();
        var token = $("#tokenCSRF");
        if(token.length && qta>0){
            updateCart(id, qta, token.val(), updateCartFun)
        }else{
            $("#login-form").modal('toggle');
        }
        e.preventDefault();
    });
    $('#login-form').submit(function (e){
        login(window.location.href);
        e.preventDefault();
    })
})