var first = true;
var old = null;

function getData(){
    fetch("../api/show_profile.php", {
        method: "get"
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function (result){
        if(result.result){
            $("#firstname").val(result.firstname);
            $("#lastname").val(result.lastname);
            $("#email").val(result.email);
            $("#city").val(result.city);
            $("#address").val(result.address);
            old = result;
        }
    })
}

function addParamOptional(v){
    var s = "";
    if(!first)
        s += "&";
    var tmp = $("#"+v).val();
    if(old[v] !== tmp){
        s += v + "=" + encodeURIComponent(tmp);
        first = false;
        return s;
    }
    return "";
}

function addParam(v){
    var s = "";
    if(!first)
        s += "&";
    var tmp = $("#"+v).val();
    if(tmp.length > 0 && old[v] !== tmp){
        s += v + "=" + encodeURIComponent(tmp);
        first = false;
        return s;
    }
    return "";
}

function buildUserPayload(){
    var s = "";
    first = true;
    s += addParam("firstname");
    s += addParam("lastname");
    s += addParam("email");
    s += addParam("pass");
    s += addParam("confirm");
    s += addParamOptional("city");
    s += addParamOptional("address");
    console.log(s);
    return s;
}

function change(){
    let data = buildUserPayload();
    fetch("../api/update_profile.php",{
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
        else if(resJson.errno === 2){
            email = false;
            $('#erroreEmail').attr('hidden', false);
        }
    })
}

$(document).ready(function() {
    getData();
    email = true;
    passwordLength = true;
    passwordEquals = true;
    $('#update-form').submit(function (e){
        if(email && passwordLength && passwordEquals)
            change();
        e.preventDefault();
    });
    $('#email').on('input', function() {
        if(this.value !== old.email)
            checkEmail();
        else
            email = true;
    });
    $("#pass").on('input', function (){
        checkPassword(this.value);
        if(this.value.length === 0){
            passwordLength = true;
            document.getElementById('errorePassword').hidden = true;
        }
    });
    $("#confirm").on('input', function (){
        checkPasswordEquals(this.value, $('#pass').val());
    });
});