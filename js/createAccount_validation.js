$.validator.addMethod("regex", function(value, element, expr){
    return expr.test(value);
}, "**Password must be at least 8 characters long and have at least one digit and one uppercase");

$(document).ready( function() {
    $("#account-form").validate({
        rules: {
            fname: {
                required: true
            },
            username: {
                required: true,
            },
            password: {
                required: true,
                regex: /^(?=.*[0-9])(?=.*[A-Z])\S{8,}?/
            },
            confirmpw: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {
           fname: {
               required: "**First name required",
           },
           username: {
               required: "**username is required"
           },
           password: {
               required: "**Password is required"
           },
           confirmpw: {
               required: "**Please re-enter your password",
               equalTo: "**Passwords do not match"
           }
        }
    });
});