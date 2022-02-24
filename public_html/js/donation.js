function buildDonationPayload(anon, amount, token){
    var s = "";
    s+="amount="+ amount + "&";
    if(anon)
        s+="anon=1&";
    else
        s+="anon=0&";
    s+="tokenCSRF="+token;
    return s;
}

function donate(anon, amount, token){
    let data = buildDonationPayload(anon, amount, token);
    fetch("../api/make_donation.php",{
        method:"post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: data,
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function (resJson){
        if(resJson.result)
            location.reload();
    })
}

$(document).ready(function (){
    $("#donation").submit(function (e){
        var anon = $("#anonimo").is(":checked");
        var amount = $("#valoreDonazioni").val();
        var token = $("#tokenCSRF");
        if(token.length)
            donate(anon, amount, token.val());
        else
            $("#login-form").modal('toggle');
        e.preventDefault();
    });
    $('#login-form').submit(function (e){
        login(window.location.href);
        e.preventDefault();
    })
})