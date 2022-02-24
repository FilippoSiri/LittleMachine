var email = false;
var passwordLength = false;
var passwordEquals = false;

function validateEmail(email) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return email.match(mailformat);
}

function checkEmail(){
    let emailForm = $('#email').val();
    if(!validateEmail(emailForm)){
        email = false;
        return;
    }
    fetch("../api/checkEmailExists.php",{
        method:"post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: "email="+encodeURIComponent(emailForm),
    }).then(function (response){
        if(response.status !== 200){
            console.log("Error. Status code: " + response.status);
            return;
        }
        return response.json();
    }).then(function (resJson){
        if(resJson.result) {
            email = false;
            $('#erroreEmail').attr('hidden', false);
        }else {
            email = true;
            $('#erroreEmail').attr('hidden', true);
        }
    });
}

function checkPassword(pass){
    if(pass.length < 12) {
        $('#errorePassword').attr('hidden', false);
        passwordLength = false;
    }else {
        $('#errorePassword').attr('hidden', true);
        passwordLength = true;
    }
    checkPasswordEquals(pass, $("#confirm").val());
}

function checkPasswordEquals(pass, confirm){
    if(pass === confirm) {
        $('#erroreConfirm').attr("hidden", true);
        passwordEquals = true;
    }else {
        $('#erroreConfirm').attr("hidden", false);
        passwordEquals = false;
    }
}





