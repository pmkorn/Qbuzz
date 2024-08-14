$(document).ready(function(){


  // CLONE EXPIRED BUSSTOPS
  $('#btnTempExpiredStops1').click(function(){ 
    //let a = $('#obstructionLinesList').find(':selected').val().clone(true).prepend('#tempExpiredStops1').val();
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



  // CLONE BUSSTOPS
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

  

  // GENERATE OBSTRUCTION NUMBER
  $('#obstructionRegion').on('change', function(){

    let obstructionRegion = $('#obstructionRegion').find(":selected").text();
    let obstructionYear = $('#obstructionYear').val();

    $.ajax({
      url: '../scripts/generate_obstructionnumber.php',
      type: 'POST',
      data: {
        obstructionRegion: obstructionRegion
      },
      cache: false,
      success: function(data) {
        
        if (data < 9) {
          dataObstructionNumber = "00" + (parseFloat(data) + parseFloat(1));
        } else if (data < 99) {
          dataObstructionNumber = "0" + (parseFloat(data) + parseFloat(1));
        } else {
          dataObstructionNumber = (parseFloat(data) + parseFloat(1));
        }

        if (obstructionRegion == "Drenthe"){
          $('#obstructionNumber').val("GDF"+obstructionYear+"-D" + dataObstructionNumber );
        } else if (obstructionRegion == "Friesland") {
          $('#obstructionNumber').val("GDF"+obstructionYear+"-F" + dataObstructionNumber );
        } else if (obstructionRegion == "Groningen") {
          $('#obstructionNumber').val("GDF"+obstructionYear+"-G" + dataObstructionNumber );
        } else {
          $('#obstructionNumber').val("GDF"+obstructionYear+"-S" + dataObstructionNumber );
        }
        console.log(dataObstructionNumber);
        
      }
    });

  });

  // SELECT LINES
  $('#selectAllCheckboxesOnAdd').on('click', function() {   

    $('input:checkbox').prop('checked', this.checked);
    let abc = [];
      $('.obstructionLines').each(function() {
        if($(this).is(":checked")) {
          abc.push($(this).val());
        }
      });
      // abc = abc.toString();
      // console.log(abc);
  });



  // SAVE OBSTRUCTION
  $('#btnSaveObstruction').on('click', function(){
    
    let obstructionNumber  = $('#obstructionNumber').val();
    let obstructionMakeDate = '';
    let obstructionMadeBy = $('#obstructionMadeBy').val();
    let obstructionRegion = $('#obstructionRegion').find(":selected").text();
    let obstructionType = $('#obstructionType').val();
    let obstructionPriority = $('#obstructionPriority').val();
    let obstructionPlace = $('#obstructionPlace').val();
    let obstructionTrajectory = $('#obstructionTrajectory').val();
    let obstructionReason = $('#obstructionReason').val();
    let obstructionDateStart = $('#obstructionDateStart').val();
    let obstructionTimeStart = $('#obstructionTimeStart').val();
    let obstructionDateEnd = $('#obstructionDateEnd').val();
    let obstructionTimeEnd = $('#obstructionTimeEnd').val();
    let obstructionLines = [];
      $('.obstructionLines').each(function() {
        if($(this).is(":checked")) {
          obstructionLines.push($(this).val());
        }
      });
    let obstructionRoute = $('#obstructionRoute').val();
    let tempExpiredStops1 = $('#tempExpiredStops1').val();
    let tempStops1 = $('#tempStops1').val();
    let obstructionCommentsExternal = $('#obstructionCommentsExternal').val();
    let obstructionCommentsInternal = $('#obstructionCommentsInternal').val();
    let obstructionDocument = $('#obstructionDocument').val();
    

    console.log(obstructionNumber + '\n' +
                obstructionMakeDate + '\n' +
                obstructionMadeBy + '\n' +  
                obstructionRegion + '\n' + 
                obstructionType + '\n' + 
                obstructionPriority + '\n' + 
                obstructionPlace + '\n' +
                obstructionTrajectory + '\n' +
                obstructionReason + '\n' +
                obstructionDateStart + '\n' +
                obstructionTimeStart + '\n' +
                obstructionDateEnd + '\n' +
                obstructionTimeEnd + '\n' +
                obstructionLines + '\n' +
                obstructionRoute + '\n' +
                'Vervallen haltes: '+ tempExpiredStops1 + '\n' + 
                'Tijdelijke haltes: ' + tempStops1 + '\n' +
                obstructionCommentsExternal + '\n' +
                obstructionCommentsInternal + '\n' +
                obstructionDocument                
              );
    $.ajax({
      url: '../scripts/insert_obstruction.php',
      type: 'POST',
      data: {
              obstructionNumber: obstructionNumber,
              obstructionMakeDate: obstructionMakeDate,
              obstructionMadeBy: obstructionMadeBy,
              obstructionRegion: obstructionRegion,
              obstructionType: obstructionType,
              obstructionPriority: obstructionPriority,
              obstructionPlace: obstructionPlace,
              obstructionTrajectory: obstructionTrajectory,
              obstructionReason: obstructionReason,
              obstructionDateStart: obstructionDateStart,
              obstructionTimeStart: obstructionTimeStart,
              obstructionDateEnd: obstructionDateEnd,
              obstructionTimeEnd: obstructionTimeEnd,
              obstructionLines: obstructionLines,
              obstructionRoute: obstructionRoute,
              tempExpiredStops1: tempExpiredStops1,
              tempStops1: tempStops1,
              obstructionCommentsExternal: obstructionCommentsExternal,
              obstructionCommentsInternal: obstructionCommentsInternal,
              obstructionDocument: obstructionDocument
      },
      cache: false,
      success: function(data) {
        console.log(data);
      }
    });
    
  });



  // RESET OBSTRUCTION FORM
  $("#btnResetObstruction").on('click', function(){
    $("#insertObstructionForm").trigger("reset");
  });



  // LOGIN USER
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
          /*setTimeout(function() {
            window.location = '../account/login/';
          }, 4000);*/
        }
      }      
      
    });
    

    //alert(employeeEmail+"\n"+employeeUserPassword);

  });



  // REGISTER USER
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
        employeeUserPassword: employeeUserPassword
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



  // SAVE WORKORDER
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



  // FINALIZE WORKORDER
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



  $('#loadObstructionOverview').on('click', function(){
    $('.spinner-wrapper').fadeIn();
    setTimeout(function(){      
      $('.spinner-wrapper').fadeOut();
    }, 2000);
    setTimeout(function(){
      $('#layoutSidenav_content').load('obstructions1.php');
    }, 2100);    
  });

  $('#insertObstruction').on('click', function(){
    $('.spinner-wrapper').fadeIn();
    setTimeout(function(){      
      $('.spinner-wrapper').fadeOut();
    }, 2000);
    setTimeout(function(){
      $('#layoutSidenav_content').load('obstructions_add.php');
    }, 2100);    
  });

  $('#overviewObstruction').on('click', function(){
    $('.spinner-wrapper').fadeIn();
    setTimeout(function(){      
      $('.spinner-wrapper').fadeOut();
    }, 2000);
    setTimeout(function(){
      $('#layoutSidenav_content').load('obstructions_overview.php');
    }, 2100);    
  });

  // SAVE BUSSTOP INFO
  $('#updateBusstopData').on('click', function() {

    let updateBusStopID = $('#updateBusStopID').val();
    let updateBusStopNumber = $('#updateBusStopNumber').val();
    let updateBusStopName = $('#updateBusStopName').val();

    console.log(updateBusStopID+ ' '+ updateBusStopNumber+' '+updateBusStopName);
    
  });



  // INSERT WORKORDER
  $('#saveWorkOrder').on('click', function(){

    alert("hallo");

  });


  
  // SELECT OPEN WORKORDER IN TABLE
  $('#openWorkorderTable tr').on ('click', function(){

    let openWorkorderTableID = $(this).data('owotid');

    console.log(openWorkorderTableID);

  })



  // OPEN WORKORDER
  $('#btnCompleteWorkorder').on('click', function(){

    let workorderID = $(this).data("workorderID");

    $.ajax({
      url: '',
      type: '',
      data: {
        workorderID:  workorderID
      },
      success: function(response) {
        $('#workOrder').html(response);
      }
    });

    console.log("Hello");

  });


  $('.list-group-workorder-item').on('click', function() {
    let workorderItemID = $(this).data("id");
    alert (workorderItemID);
  });


















  //Set status of employee
  $('.user-status-switch input[type="checkbox"]').on('change', function(){
    
    let employeeID = $(this).data("id");
    let employeeIsActive = $(this).data("status");
    
    $.ajax({
      url: '../scripts/update_user_status.php',
      type: 'POST',
      data: {
        employeeID: employeeID,
        employeeIsActive: employeeIsActive
      },
      success: function(response){
        $('#employee-'+employeeID).html(response);
      }
    });

  }); 
  
  //Edit setting of employee
  $('.edit-employee').on('click', function() {
    
    let employeeID = $(this).data("id");

    $.ajax({
      url: '../scripts/edit_employee_details.php',
      type: 'POST',
      data: {
        employeeID: employeeID
      },
      success: function(response){
        $('#employeeDetails .modal-content').html(response);
      }
    });

    $('#employeeDetails').modal('show');

  });

  //Set employee Permissions
  $('.permissionFunction').on('click', function() {

    let permission = $(this).data("id");

    alert(permission);



  });

  $('.save').on('click', function(){
    alert("you clicked save");
  });




  $('.obstruction-card').on('click', function(){
    alert('HELLO');
  })










    /*setInterval(function() {
    let x = Math.ceil(Math.random() * 100);
    $('#hoofd').html(x);
  }, 3000);*/


});