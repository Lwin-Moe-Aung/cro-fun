
$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='reset_password']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            password_confirmation:{
                required:true,
                equalTo:"#password"

            },
            password:"required"

        },
        // Specify validation error messages
        messages: {

            password: "* Please enter your password",
            password_confirmation:{
                required:"*Please enter password confirmation",
                equalTo:"*Please enter the same password as above"
            }

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
