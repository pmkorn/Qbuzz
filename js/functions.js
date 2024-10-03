$(document).ready( function(){

  // Login user
  $('#btnUserLogin').on('click', function(){

    let employeeUserName = $('#employeeUserName').val();
    let employeeUserPassword = $('#employeeUserPassword').val();
    console.log('Gebruikersnaam: '+employeeUserName+' Wachtwoord: '+employeeUserPassword);

    $.ajax ({
      url: '../scripts/user_login.php',
      type: 'POST',
      data: {
        employeeUserName: employeeUserName,
        employeeUserPassword: employeeUserPassword
      },
      cache: false,
      success: function(data) {
        console.log(data);
        if (data === 'success') {
          $('#btnUserLogin').hide();
          $('#btnSpinner').show();
          $("#alert-success").slideDown(); // use slide down for animation
          setTimeout(function () {
            $("#alert-success").slideUp(500);
          }, 3000);
          setTimeout(function() {
            window.location = '/';
          }, 4000);
        } else {
          $("#alert-danger").slideDown(); // use slide down for animation
          setTimeout(function () {
            $("#alert-danger").slideUp(500);
          }, 3000);
          /*setTimeout(function() {
            window.location = '../account/login/';
          }, 4000);*/
        }
      }

    });

  });

  // Register user
  $('#btnUserRegister').on('click', function() {
    let firstName = $('#firstName').val();
    let lastName = $('#lastName').val();
    let email = $('#email').val();
    let userPassword = $('#userPassword').val();

    $.ajax({
      url: '../scripts/user_register.php',
      type: 'POST',
      data: {
        firstName: firstName,
        lastName: lastName,
        email: email,
        userPassword: userPassword
      },
      cache: false,
      success: function(data) {
        //alert(data);
        $("#alert-success").slideDown(); // use slide down for animation
        setTimeout(function () {
        $("#alert-success").slideUp(500);
        }, 3000);
      },
      error: function(data) {
        $("#alert-danger").slideDown(); // use slide down for animation
        setTimeout(function () {
        $("#alert-danger").slideUp(500);
        }, 3000);
      }
    });

    $("#register-form").trigger("reset");

  });

  $(".nav .nav-link").on("click", function(){
    $(".nav").find(".active").removeClass("active");
    $(this).addClass("active");
 });

});