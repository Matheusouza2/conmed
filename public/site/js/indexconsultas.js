$('#data').mask('00/00/0000');
$('#data').datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR",
    daysOfWeekDisabled: "0",
    startDate: "+0d"
  });

  $('#data').blur(function (){
    var data = $(this).val();
    if(data !== ""){
        
    }
    
  });

  $.ajax({
    url: "/admin/appointment/listToday",
    dataType: "json",
    success: function (data) {
      var table;
      $.each(data, function(i, obj){table += '<tr>'+
        '<th scope="row">'+obj.ticket+'</th>'+
        '<td>'+obj.patient_name+'</td>'+
        '<td>'+obj.telefone+'</td>'+
        '<td>'+obj.doctor_name+'</td>'+
        '<td hidden="true">'+obj.id+'</td>'+
        '</tr>'
      });
      $('#waitingroom').html(table).show();
      $('#alert-loading').attr('hidden', true);
    },
    error: function(data){
        console.log(data);
        alert("Erro")
    }
  });

  $.ajax({
    url: "/admin/appointment/listStatus",
    dataType: "json",
    success: function (data) {
      var table;
      $.each(data, function(i, obj){
        var icon;
        var color;
        switch (obj.status) {
          case "Em andamento":
            icon = "fa-walking";
            color = "text-info"
            break;
          case "Em atendimento":
            icon = "fa-door-closed";
            color = "text-error"
            break;
          case "Liberado":
            icon = "fa-door-open";
            color = "text-success"
            break;
          default:
            break;
        }
        table += '<tr>'+
        '<th scope="row">'+obj.ticket+'</th>'+
        '<td>'+obj.patient_name+'</td>'+
        '<td>'+obj.doctor_name+'</td>'+
        '<td><i class="fas '+icon+' '+color+' mr-3"></i>'+obj.status+'</td>'+
        '<td hidden="true">'+obj.id+'</td>'+
        '</tr>'
      });
      $('#tablecare').html(table).show();
      $('#alert-loading-2').attr('hidden', true);
    },
    error: function(data){
        console.log(data);
        alert("Erro")
    }
  });

  function chamarTicket(){

    var tr = $('#waitingroom').children('tr:first-child');
    var ticket = tr.children('th:nth-child(1)').text()
    var id_appointment = tr.children('td:nth-child(5)').text()
    
    if(tr.length == 0){
      Swal.fire('Por hoje é só!', 'Não tem mais paciente na sala de espera para serem atendidos.', 'info')
    }

      
    $.ajax({
      url: "/admin/appointment/update",
      data: {
        "_token" : $('meta[name="csrf-token"]').attr('content'),
        "appointment" : id_appointment,
        "status" : "Em andamento"
      },
      method: 'PUT',
      dataType: "json",
      success: function(data){
        var table;
        $.each(data, function(i, obj){
          var icon;
          var color;
          switch (obj.status) {
            case "Em andamento":
              icon = "fa-walking";
              color = "text-info"
              break;
            case "Em atendimento":
              icon = "fa-door-closed";
              color = "text-error"
              break;
            case "Liberado":
              icon = "fa-door-open";
              color = "text-success"
              break;
            default:
              break;
          }
          table += '<tr>'+
          '<th scope="row">'+obj.ticket+'</th>'+
          '<td>'+obj.patient_name+'</td>'+
          '<td>'+obj.doctor_name+'</td>'+
          '<td><i class="fas '+icon+' '+color+' mr-3"></i>'+obj.status+'</td>'+
          '<td hidden="true">'+obj.id+'</td>'+
          '</tr>'
        });
        $('#tablecare').html(table).show();
      },
      error: function(data){
        console.log(data);
      }
    });



    tr.fadeOut(600, function() {	      tr.remove();  	    });	

    $('#ticket').hide().html('<br><br><h1 style="font-size: 50px;">'+ticket+'</h1><br><br>').fadeIn(800, function() {	      $(this).show();  	    });	

  }