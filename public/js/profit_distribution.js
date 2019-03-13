$('#profit_paid_date').datepicker({
    format: 'dd-M-yyyy'
});


$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='profit_distribution']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            profit_paid_date:{
                required: true

            }


        },
        // Specify validation error messages
        messages: {

            profit_paid_date:{
                required: "<p style='color:red;'>* Please select profit paid  date.</p>",


            }


        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
