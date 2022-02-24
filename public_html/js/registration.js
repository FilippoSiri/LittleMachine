function buildUserPayload() {
    var s = "";
    s += "firstname=" + encodeURIComponent($("#firstname").val()) + "&";
    s += "lastname=" + encodeURIComponent($("#lastname").val()) + "&";
    s += "email=" + encodeURIComponent($("#email").val()) + "&";
    s += "pass=" + encodeURIComponent($("#pass").val()) + "&";
    s += "confirm=" + encodeURIComponent($("#confirm").val()) + "&";
    s += "city=" + encodeURIComponent($("#city").val()) + "&";
    s += "address=" + encodeURIComponent($("#address").val());
    return s;
}

function register() {
    let data = buildUserPayload();
    fetch("../api/registration.php", {
        method: "post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: data,
    }).then(function(response) {
        if (response.status !== 200) {
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function(resJson) {
        if (resJson.result)
            document.location.href = "/~S4819642/";
        else if(resJson.errno === 2){
            email = false;
            $('#erroreEmail').attr('hidden', false);
        }
    })
}

$(document).ready(function() {
    $('#email').on('input', function() {
        checkEmail();
    });
    $('#register-form').submit(function(e) {
        if (email && passwordLength && passwordEquals)
            register();
        e.preventDefault();
    })
    $("#pass").on('input', function() {
        checkPassword(this.value);
    });
    $("#confirm").on('input', function() {
        checkPasswordEquals($("#pass").val(), this.value);
    });
});