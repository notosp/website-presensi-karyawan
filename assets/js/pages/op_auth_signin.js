/*
 *  Document   : op_auth_signin.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Sign In Page
 */

var OpAuthSignIn = function() {
    // Init Sign In Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationSignIn = function(){
        jQuery('.js-validation-signin').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'login-username': {
                    required: true,
                    minlength: 3
                },
                'login-nip': {
                    required: true,
                    minlength: 3
                },
                'login-password': {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                'login-username': {
                    required: 'Mohon isikan Username Anda',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'login-nip': {
                    required: 'Mohon isikan NIP Anda',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                'login-password': {
                    required: 'Mohon isikan Password Anda',
                    minlength: 'Your password must be at least 5 characters long'
                }
            }
        });
    };

    return {
        init: function () {
            // Init Sign In Form Validation
            initValidationSignIn();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ OpAuthSignIn.init(); });
