$(document).ready(function () {

  $('#formPassword').validate({
    rules: {
      password: {
        required: true,
        minlength: 6,
        validPassword: true
      }
    },
    messages: {
      email: {
        remote: 'Email address already taken'
      }
    }
  });
});

$('#inputPassword').hideShowPassword({
  show: false,
  innerToggle: 'focus'
})