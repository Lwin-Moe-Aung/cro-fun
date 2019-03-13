
$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='payment']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            payment_date:{
                required: true

            },
            remark:{
                required:true
            }


        },
        // Specify validation error messages
        messages: {

            payment_date:{
                required: "<p style='color:red;'>* Please select payment date.</p>",


            },
            remark:{
                required: "<p style='color:red;'>* Please enter remark</p>",
            }



        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
$('#payment_date').datepicker({
    format: 'dd-M-yyyy'
});

