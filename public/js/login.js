
$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='login']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            email:{
                required: true,
                email:true
            },
            password:"required"

        },
        // Specify validation error messages
        messages: {

            email:{
                required: "* Please enter your email address",
                email:"* Please enter valid email address"
            },
            password: "* Please enter your password"

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {

            form.submit();
        }
    });
});