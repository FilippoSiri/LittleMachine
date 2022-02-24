function updateCartFun(result, id, qta){
    if(!result.result){
        if(qta > 1)
            $("#ultimoProdotto"+id).attr("hidden", false);
        else
            $("#prodottoEsaurito"+id).attr("hidden", false);
        $("#button"+id).attr("hidden", true);
    }else{
        if(document.getElementById("cart-icon").classList.contains("animazione"))
            document.getElementById("cart-icon").classList.remove("animazione");
        document.getElementById("cart-icon").offsetWidth;
        document.getElementById("cart-icon").classList+=" animazione";
    }
}

$(document).ready(function (){
    $('.infoProduct').submit(function (e){
        var id = $(this).attr("id");
        var token = $("#tokenCSRF"+id);
        var qtaEl = $("#qta"+id);
        var qta = parseInt(qtaEl.val())+1;
        qtaEl.val(qta);
        if(token.length > 0){
            updateCart(id, qta, token.val(), updateCartFun);
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