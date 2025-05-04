$(document).ready(function () {

    // Login user
    $('#btnUserLogin').on('click', function () {

        let employeeUserName = $('#employeeUserName').val();
        let employeeUserPassword = $('#employeeUserPassword').val();
        console.log('Gebruikersnaam: ' + employeeUserName + ' Wachtwoord: ' + employeeUserPassword);

        $.ajax({
            url: '../scripts/user_login.php',
            type: 'POST',
            data: {
                employeeUserName: employeeUserName,
                employeeUserPassword: employeeUserPassword
            },
            cache: false,
            success: function (data) {
                console.log(data);
                if (data === 'success') {
                    $('#btnUserLogin').hide();
                    $('#btnSpinner').show();
                    $("#alert-success").slideDown(); // use slide down for animation
                    setTimeout(function () {
                        $("#alert-success").slideUp(500);
                    }, 3000);
                    setTimeout(function () {
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
    $('#btnUserRegister').on('click', function () {
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
            success: function (data) {
                //alert(data);
                $("#alert-success").slideDown(); // use slide down for animation
                setTimeout(function () {
                    $("#alert-success").slideUp(500);
                }, 3000);
            },
            error: function (data) {
                $("#alert-danger").slideDown(); // use slide down for animation
                setTimeout(function () {
                    $("#alert-danger").slideUp(500);
                }, 3000);
            }
        });

        $("#register-form").trigger("reset");

    });

    $(".nav .nav-link").on("click", function () {
        $(".nav").find(".active").removeClass("active");
        $(this).addClass("active");
    });



    //INSERT WORKORDERS
    $("#insertWorkOrder").on('click', function () {
        let busstopList = $("#busstopList").val();
        let busStopID = $('#busstopListOverview [value="' + busstopList + '"]').data('id');

        //console.log($('#busstopListOverview [value="' + busstopList +'"]').data('id')+ ' ' + busstopList );
    });

    $('#category1').on('change', function () {
        let categoryID = $(this).val();
        $.ajax({
            url: '../scripts/findSubCat.php',
            type: "POST",
            cache: false,
            data: {
                categoryID: categoryID
            },
            success: function (data) {
                $('#category2').html(data);
            }
        });
    });

    // Update user Active or Non-Active
    $('[type="checkbox"]').on('change', function () {

        let employeeID = $(this).data("id");
        let employeeIsActive = $(this).data("is-active");

        $.ajax({
            url: '../scripts/user_status.php',
            type: 'POST',
            data: {
                employeeID: employeeID,
                employeeIsActive: employeeIsActive
            },
            cache: false,
            success: function (response) {
                $('#employee-status-' + employeeID).html(response);
            }
        });
    });

    // Fetch gemeente
    $('#obstructionRegion').on('change', function () {

        let provincie = $(this).find(":selected").val();

        $.ajax({
            url: '../scripts/fetch_gemeente.php',
            type: 'POST',
            data: {
                provincie: provincie
            },
            cache: false,
            success: function (response) {
                $('#obstructionCounty').prop("disabled", false);
                $('#obstructionCounty').html(response);
            }
        });

    });

    // Fetch plaats
    $('#obstructionCounty').on('change', function () {

        let gemeente = $(this).find(":selected").val();

        $.ajax({
            url: '../scripts/fetch_plaats.php',
            type: 'POST',
            data: {
                gemeente: gemeente
            },
            cache: false,
            success: function (response) {
                $('#obstructionPlace').prop("disabled", false);
                $('#obstructionPlace').html(response);
            }
        });

    });

    $('.dots').on('click', function () {

        let voertuigNummer = $(this).data("nummer");

        $.ajax({
            url: '../scripts/fetch_voertuig_info.php',
            type: 'POST',
            data: {
                voertuigNummer: voertuigNummer
            },
            cache: false,
            success: function (response) {
                $('#voertuigInzet .modal-body').html(response);
            }
        });

    });

    let voertuigConsessieCode = [];

    $('input[name="voertuigConsessieCode"]:checked').each(function() {
        voertuigConsessieCode.push($(this).val());
    });

    console.log(voertuigConsessieCode);

    $(".consessie-filter").on('click', function() {

        let voertuigConsessieCode = [];

        $('input[name="voertuigConsessieCode"]:checked').each(function() {
            voertuigConsessieCode.push($(this).val());
        });

        console.log(voertuigConsessieCode);

        // $.ajax({
        //     url: '../scripts/fetch_voertuig_data.php',
        //     type: 'POST',
        //     data: {
        //         voertuigConsessieCode: voertuigConsessieCode
        //     },
        //     cache: false,
        //     success: function (response) {
        //         $('#voertuigTable tbody').html(response);
        //     }
        // });

    });

});