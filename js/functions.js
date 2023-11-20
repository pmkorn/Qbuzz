$(document).ready(function(){

  $('#btnTempExpiredStops1').click(function(){ 
    //let a = $('#obstructionLinesList').find(':selected').val().clone(true).prepend('#tempExpiredStops1').val();;
    //alert(a);

    let obstructionLinesList = [];
      $('#obstructionLinesList').each(function() {
        if($(this).find(":selected")) {
          obstructionLinesList.push($(this).val());
        }
      });
    //obstructionLinesList = obstructionLinesList.toString();
    //obstructionLinesList.clone();
    $('#tempExpiredStops1').val(obstructionLinesList);
    //$('#options').find('option').clone().appendTo('#options2');
    //alert(obstructionLinesList);

  });

  $('#btnTempStops1').click(function(){ 
    //let a = $('#obstructionLinesList').find(':selected').val().clone(true).prepend('#tempExpiredStops1').val();;
    //alert(a);

    let obstructionLinesList = [];
      $('#obstructionLinesList').each(function() {
        if($(this).find(":selected")) {
          obstructionLinesList.push($(this).val());
        }
      });
    //obstructionLinesList = obstructionLinesList.toString();
    //obstructionLinesList.clone();
    $('#tempStops1').val(obstructionLinesList);
    //$('#options').find('option').clone().appendTo('#options2');
    //alert(obstructionLinesList);

  });

  $('#btnSaveObstruction').on('click', function(){
    let obstructionRegion = $('#obstructionRegion').find(":selected").text();
    let tempExpiredStops1 = $('#tempExpiredStops1').val();
    let tempStops1 = $('#tempStops1').val();
    console.log(obstructionRegion + '\n' + 'Vervallen haltes: '+ tempExpiredStops1 + '\n' + 'Tijdelijke haltes: ' + tempStops1);
  });

  $("#btnResetObstruction").on('click', function(){
    $("#insertObstructionForm").trigger("reset");
  });

  $('#btnEmployeeLogin').on('click', function() {

    let employeeUserName = $('#employeeUserName').val();
    let employeeUserPassword = $('#employeeUserPassword').val();
    let formdata = $('#userLoginForm').serialize();
    
    console.log(formdata);
    
    $.ajax ({
      url: '../scripts/user_login_script.php',
      type: 'POST',
      data: {
        employeeUserName: employeeUserName,
        employeeUserPassword: employeeUserPassword,
      },
      data: formdata,
      cache: false,
      success: function(data) {
        if (data === 'success') {
          $('#btnEmployeeLogin').hide();
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
          setTimeout(function() {
            window.location = '../account/login/';
          }, 4000);
        }
      }      
      
    });
    

    //alert(employeeEmail+"\n"+employeeUserPassword);

  });

  $('#btnEmployeeRegister').on('click', function(){

    let employeeFirstName = $('#employeeFirstName').val();
    let employeeLastName = $('#employeeLastName').val();
    let employeeEmail = $('#employeeEmail').val();
    let employeeUserPassword = $('#employeeUserPassword').val();
    //let employeeUserPasswordRepeat = $('#employeeUserPasswordRepeat').val();

    $.ajax ({
      url: '../scripts/user_registration_script.php',
      type: 'POST',
      data: {
        employeeFirstName: employeeFirstName,
        employeeLastName: employeeLastName,
        employeeEmail: employeeEmail,
        employeeUserPassword: employeeUserPassword,
        //employeeUserPasswordRepeat: employeeUserPasswordRepeat
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
    //alert(employeeEmail + "\n" + employeeUserPassword + "\n" + employeeUserPasswordRepeat);

    $("#userLoginForm").trigger("reset");

  });

  $('.btnSaveWorkOrder').on('click', function(){
    
    let busStopID = $(this).val();
    let inputNewWorkOrderNotification = $('#inputNewWorkOrderNotification'+busStopID).val();
    let workOrderInsertedBy = $('#workOrderInsertedBy').val();
    //alert(busStopID+"\n"+inputNewWorkOrderNotification+"\n"+workOrderInsertedBy);

    //$('#newWorkOrder'+busStopID).modal('toggle');
    //$('#inputNewWorkOrderForm'+busStopID).trigger("reset");
    //console.log(busStopID+"\n"+inputNewworkOrderNotification);

    $.ajax({
      url: '../scripts/insert_workorder.php',
      type: 'POST',
      data: {
        busStopID: busStopID,
        inputNewWorkOrderNotification: inputNewWorkOrderNotification,
        workOrderInsertedBy: workOrderInsertedBy
      },
      success: function(data) {      
        
        $('#newWorkOrder'+busStopID).modal('toggle');
        $('#inputNewWorkOrderForm'+busStopID).trigger("reset"); 
        setTimeout(function(data) {
          location.reload(true);
          //$('#workorder-overview').load('#workorder-overview');
          return false;
        }, 500);
      }
    });

  });

  $('.btnWorkOrderFinalize').on('click', function() {

    let workOrderID = $(this).val();
    let inputNewWorkOrderRepairNotification = $('#inputNewWorkOrderRepairNotification'+workOrderID).val();
    let workOrderFinalizedBy = $('#workOrderFinalizedBy').val();

    $.ajax({
      url: '../scripts/finalize_workorder.php',
      type: 'POST',
      data: {
        workOrderID: workOrderID,
        inputNewWorkOrderRepairNotification: inputNewWorkOrderRepairNotification,
        workOrderFinalizedBy: workOrderFinalizedBy
      },
      success: function(data) {
        $('#workOrderFinalize'+workOrderID).modal('toggle');
        setTimeout(function(data) {
          location.reload(true);
          return false;
        }, 500);
        
      }
    });

  });

  $('#logout').on('click', function() {
    var opdracht = $(this).attr("data-logout");
    alert(opdracht);
  });

  /*setInterval(function() {
    let x = Math.ceil(Math.random() * 100);
    $('#hoofd').html(x);
  }, 3000);*/

});