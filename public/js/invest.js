$.validator.addMethod("checkamount", function(value, element) {
    var result=true;
    var amount = $('#amount').val();
    if(amount%10000!=0)
    {
        result=false;
    }
    return result;

}, "Invalid Investment Amount");

$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#project_info").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            amount:{
                required: true,
                checkamount:true,
                number:true

            }


        },
        // Specify validation error messages
        messages: {

            amount:{
                required: "<p style='color:red;'>* Please enter your investment amount</p>",
                checkamount: "<p style='color:red;'>*Invalid amount</p>",
                number:"<p style='color:red;'>*Please enter number only</p>"

            }


        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {

            form.submit();
        }
    });
});