$(document).ready(function () {

  $('#formSignup').validate({
    rules: {
      name: 'required',
      email: {
        required: true,
        email: true,
        remote: '/account/validate-email'
      },
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