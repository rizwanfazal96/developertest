function handleApiRequest(action, data) {
  $.ajax({
      type: 'POST',
      url: 'index.php?action=' + action,
      data: { data: JSON.stringify(data) },
      success: function (response) {
          console.log(response);
          // Handle the response here
      },
      error: function (error) {
          console.error('API request error:', error.responseJSON);
          // Handle errors here
      }
  });
}

$(document).ready(function () {
  // Login
  $('#loginForm').submit(function (event) {
      event.preventDefault();
      var email = $('#inputEmail').val();
      var password = $('#inputPassword').val();
      var rememberMe = $('#inputRememberMe').prop('checked');
      handleApiRequest('login', { email: email, password: password,rememberMe: rememberMe });
  });

  //other routes handling here just for demo, these are not implemented yet

  // Logout
  $('#logoutButton').click(function () {
      handleApiRequest('logout', {});
  });


  // Registration
  $('#registerForm').submit(function (event) {
      event.preventDefault();
      var email = $('#registerEmail').val();
      var password = $('#registerPassword').val();
      // Add other registration data as needed
      handleApiRequest('register', { email: email, password: password });
  });
});
