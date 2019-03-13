/*$.validator.addMethod("check", function(value, element) {
    var result=true;
    var revenue = $('#revenue').val();
    var loan_value = $('#loan_value').val();

    if(parseInt(revenue)<=parseInt(loan_value))
    {
        result=false;
    }
    return result;

}, "Revenue must be greater than loan value");*/

$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='profit']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            profit_generated_date:{
                required: true

            },
            revenue:{
                required: true,
                //check:true,
                number:true
            },
            remark:{
                required:true
            }


        },
        // Specify validation error messages
        messages: {

            profit_generated_date:{
                required: "<p style='color:red;'>* Please select profit generated  date.</p>",


            },
            revenue:{
                required: "<p style='color:red;'>* Please enter revenue.</p>",
                number: "<p style='color:red;'>* Invalid revenue.</p>"
                //check:"<p style='color:red;'>*Revenue must be greater than loan value.</p>"
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


$('#profit_generated_date').datepicker({
    format: 'dd-M-yyyy'
});
