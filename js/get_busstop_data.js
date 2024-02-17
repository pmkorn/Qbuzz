
  $.ajax({
    url: '../includes/get_busstop_data.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      console.log(data);

      let html_append = '';
      
      $.each(data, function(index, item) {
        html_append +=
        '<tr>' +
          '<td></td>'+
          '<td>' + item.busStopName + '</td>'+
          '<td>' + item.busStopNumber + '</td>'+
          '<td>Actie</td>'+ 
        '</tr>';
      });

      $('#busStopTable tbody').html(html_append);

    }
    
  });
