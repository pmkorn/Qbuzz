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

  // $('#employeeUserName').keypress(function(e){
  //   if (e.which == 13) callback();
  // });
  // $('#employeeUserPassword').keypress(function(e){
  //   if (e.which == 13) callback();
  // })
  // $('#btnEmployeeLogin').on('click', callback);

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



  //INSERT WORKORDERS
  $("#insertWorkOrder").on('click', function() {
  let busstopList = $("#busstopList").val();
  let busStopID = $('#busstopListOverview [value="' + busstopList +'"]').data('id');
   
  //console.log($('#busstopListOverview [value="' + busstopList +'"]').data('id')+ ' ' + busstopList );
  });

  $('#category1').on('change', function() {
    let categoryID = $(this).val();
    $.ajax ({
      url: '../scripts/findSubCat.php',
      type: "POST",
      cache: false,
      data: {
        categoryID: categoryID
      },
      success: function(data) {
        $('#category2').html(data);
      }
    });
  });

});