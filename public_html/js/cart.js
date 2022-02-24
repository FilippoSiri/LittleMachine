function updateCartFun(result, id){
    if(result.result) {
        document.getElementById('totale').innerText = result.tot;
        $("#avvisoerrore"+id).attr("hidden", true);
        $("#button"+id).attr("hidden", true);
        if(!$(".interoProdotto").length){
            $("#carrelloTotale").remove();
            $("#contenitoreCarrello").html("<h5 class=\"spazioSinistra sottotitoloPagina padding\" style=\"margin-top:20px\">Nessun elemento nel carrello</h5>");
        }
    }else{
        $("#avvisoerrore"+id).attr("hidden", false);
    }
}

function buy(){
    fetch("../api/buy.php?tokenCSRF="+$("#tokenCSRF").val(), {
        method: "get",
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function (result){
        if(result.result){
            $("#contenitoreCarrello").html("<h5 class=\"spazioSinistra sottotitoloPagina padding\">"+result.error+"</h5>");
            $("#carrelloTotale").remove();
        }else{
            $("#erroreCart").html(result.error);
        }
    });
}

function rimuovi(x){
    token = document.getElementById('tokenCSRF').value;
    updateCart(x, 0, token, updateCartFun);
    $("#div"+x).remove();

}

$(document).ready(function (){
    $('.infoProduct').submit(function (e){
        var id = $(this).attr("id");
        var qta = $("#qta"+id).val();
        var token = $("#tokenCSRF").val();
        updateCart(id, qta, token, updateCartFun);
        e.preventDefault();
    });
    $('.rimuovi').on('mousedown',function (){
        var id = $(this).attr('id');
        var idP = id.substring(7);
        rimuovi(idP);
    });
    $('.aggiorna').on('input', function (){
        var id = $(this).attr('id');
        var idP = id.substring(3);
        $("#button"+idP).attr("hidden", false);
    });
    $('#acquista').on('mousedown', function (){
        buy();
    })
})
