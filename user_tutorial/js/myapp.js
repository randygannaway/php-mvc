$(document).ready(function() {

    $('#signupForm').validate({
        rules: {
            email: {
                remote: {
                    url: '/validate_email.php',
                    type: 'post'
                }
            },
            password: {
                minlength: 5
            }
        },

        messages: {
            email: {
                remote: 'Already taken, please choose another one.'
            },
            password: {
                required: 'This field is required',
                minlength: $.validator.format('Please enter at least {0} characters.')     
            }
        }
    });
});
