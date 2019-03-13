$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("#project_status_finance").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            return_estimation_approved:{
                required:true,
                number:true,
                min:1
            },
            collateral_estimated_value: {
                required:true,
                number:true,
                min:1
            },
            profit_sharing_estimation:{
                required:true,
                number:true,
                range: [1, 100]
            },
            profit_sharing_description:{
                required:true

            },
            status:"required",
            comment:"required"

        },
        // Specify validation error messages
        messages: {

            return_estimation_approved:{
                required: "* Please enter return estimation",
                number:"* Please enter only number",
                min: "* Please enter greater than 0"
            },
            profit_sharing_estimation:{
                required: "* Please enter profit sharing estimation",
                number:"* Please enter only number",
                range:"* Please enter a number  from 1 to 100"
            },
            collateral_estimated_value:{
                required: "* Please enter collateral estimated value",
                number:"* Please enter only number",
                min: "* Please enter greater than 0"
            },
            profit_sharing_description:{
                required: "* Please enter profit sharing description"

            },
            status:"* Please select one",
            comment:"* Please enter project comment"



        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
   
});