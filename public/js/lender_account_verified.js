
$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='lender_account_status']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            verified:{
                required: true

            }


        },
        // Specify validation error messages
        messages: {

            verified:{
                required: "<p style='color:red;'>* Please choose the status to verify</p>"


            }




        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});