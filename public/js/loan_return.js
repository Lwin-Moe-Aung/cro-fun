
$(function() {


    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='loan_return']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            payment_date:{
                required: true

            },
            amount:{
                required: true,
                number:true,
                max : parseInt($('#hd_remain_loan_value').val())
            },
            remark:{
                required:true
            }


        },
        // Specify validation error messages
        messages: {

            payment_date:{
                required: "<p style='color:red;'>* Please select payment  date.</p>",


            },
            amount:{
                required: "<p style='color:red;'>* Please enter amount.</p>",
                number: "<p style='color:red;'>* Invalid amount</p>",
                max : "<p style='color:red;'>* Exceed amount</p>"

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
