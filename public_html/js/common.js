$(document).ready(function (){
    $("#search-form").submit(function (e){
        window.location.href = "/~S4819642/pages/search.php?search="+$("#search-input").val();
        e.preventDefault();
    })
})

function buildLoginPayload(){
    var s = "";
    s += "email=" + encodeURIComponent($("#email").val()) + "&";
    s += "pass=" + encodeURIComponent($("#pass").val());
    return s;
}
function login(redirect){
    let data = buildLoginPayload();

    fetch("../api/login.php",{
        method:"post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: data,
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function (result){
        console.log(result);
        if(result.result)
            document.location.href=redirect;
        else
            document.getElementById('erroreEmailOPassword').style = '';
    })
}

function updateCart(id, qta, token, fun){
    data = "idP="+id+"&qta="+qta+"&tokenCSRF="+token;
    fetch("../api/update_cart.php?"+data, {
        method: "get",
        headers: { "Content-type": "application/x-www-form-urlencoded" }
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(result => fun(result, id, qta));
}