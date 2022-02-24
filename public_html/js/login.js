$(document).ready(function() {
    $('#login-form').submit(function(e) {
        login("/");
        e.preventDefault();
    })
});