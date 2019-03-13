$(function () {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            name: "required",
            nrc: "required",
            address: "required",
            phone_no: "required",
            attachment: "required",
            email: {
                required: true,
                email: true
            },
            password: "required",
            dob: "required",
            password_confirmation: {
                required: true,
                equalTo: "#password"

            },
            field_officers_id: {
                required: true,
                number: true
            },
            state: "required",
            township: "required"

        },
        // Specify validation error messages
        messages: {
            name: "* Please enter your name",
            nrc: "* Please enter your nrc",
            address: "* Please enter your address",
            phone_no: "*Please enter your phone no",
            attachment: "*Please upload your attachment file",
            email: {
                required: "* Please enter your email address",
                email: "* Please enter valid email address"
            },
            password: "* Please enter your password",
            password_confirmation: {
                required: "*Please enter password confirmation",
                equalTo: "*Please enter the same password as above"
            },
            state: " * Please select your state",
            township: "* Please select your township",
            dob: " * Please select your date of birth"


        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});