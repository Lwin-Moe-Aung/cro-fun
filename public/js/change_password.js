$(function () {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='change_password']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            old_password: "required",

            password: "required",

            password_confirmation: {
                required: true,
                equalTo: "#password"

            }


        },
        // Specify validation error messages
        messages: {
            old_password: "* Please enter your old password",
            password: "* Please enter your password",
            password_confirmation: {
                required: "*Please enter password confirmation",
                equalTo: "*Please enter the same password as above"
            }



        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});