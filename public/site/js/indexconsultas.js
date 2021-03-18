$('#data').mask('00/00/0000');
$('#data').datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR",
    daysOfWeekDisabled: "0",
    startDate: "+0d"
  });
  var agendados = 0,espera = 0,atendidos = 0,faltosos = 0;
  $.ajax({
    url: "/admin/appointment/listToday",
    dataType: "json",
    success: function (data) {
      var table;
      $.each(data, function(i, obj){
        espera += 1;
        table += '<tr>'+
        '<th scope="row">'+obj.ticket+'</th>'+
        '<td>'+obj.patient_name+'</td>'+
        '<td>'+obj.telefone+'</td>'+
        '<td>'+obj.doctor_name+'</td>'+
        '<td hidden="true">'+obj.id+'</td>'+
        '</tr>';
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
      if(data.length == 0){
        Cookies.set('ticket', '00');
      }
      $.each(data, function(i, obj){
        var icon;
        var color;
        switch (obj.status) {
          case "A caminho":
            icon = "fa-walking";
            color = "text-info";
            break;
          case "Em atendimento":
            icon = "fa-door-closed";
            color = "text-danger";
            break;
          case "Liberado":
            icon = "fa-door-open";
            color = "text-success";
            atendidos += 1;
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
      $('#agendados').html(espera+atendidos+faltosos).show();
      $('#atendidos').html(atendidos).show();
      $('#espera').html(espera).show();
      $('#faltosos').html(faltosos).show();
      $('#ticket').hide().html('<br><br><h1 style="font-size: 50px;">'+Cookies.get('ticket')+'</h1><br><br>').fadeIn(800, function() {	      $(this).show();   });	
    },
    error: function(data){
        console.log(data);
        alert("Erro")
    }
  });
 

  
  function chamarTicket(){
    var tr = $('#waitingroom').children('tr:first-child');
    var ticket = tr.children('th:nth-child(1)').text();
    var id_appointment = tr.children('td:nth-child(5)').text();
    Cookies.set('ticket', ticket);
    Cookies.set('status_appointment', "A caminho");
    if(tr.length == 0){
      Swal.fire('Por hoje é só!', 'Não tem mais paciente na sala de espera para serem atendidos.', 'info');
      return;
    }
  
    $.ajax({
      url: "/admin/appointment/update",
      data: {
        "_token" : $('meta[name="csrf-token"]').attr('content'),
        "appointment" : id_appointment,
        "status" : "A caminho"
      },
      method: 'PUT',
      dataType: "json",
      success: function(data){
        var table = "";
        data.reverse();
        $.each(data, function(i, obj){
          var icon;
          var color;
          switch (obj.status) {
            case "A caminho":
              icon = "fa-walking";
              color = "text-info";
              break;
            case "Em atendimento":
              icon = "fa-door-closed";
              color = "text-danger";
              break;
            case "Liberado":
              icon = "fa-door-open";
              color = "text-success";
              break;
            default:
              break;
          }
          if(obj.status != null){
            table += '<tr>'+
            '<th scope="row">'+obj.ticket+'</th>'+
            '<td>'+obj.patient_name+'</td>'+
            '<td>'+obj.doctor_name+'</td>'+
            '<td id="status_appointment"><i id="icon_status" class="fas '+icon+' '+color+' mr-3"></i>'+obj.status+'</td>'+
            '<td hidden="true">'+obj.id+'</td>'+
            '</tr>'
          }
        });
        $('#tablecare').html(table).show();
      },
      error: function(data){
        console.log(data);
      }
    });



    tr.fadeOut(600, function() {	      tr.remove();  	    });	

    $('#ticket').hide().html('<br><br><h1 style="font-size: 50px;">'+ticket+'</h1><br><br>').fadeIn(800, function() {	      $(this).show();   });	

  }

  function devolverTicket(){
    var tr = $('#tablecare').children('tr:first-child');
    var id_appointment = tr.children('td:nth-child(5)').text();
    var situacao = tr.children('td:nth-child(4)').text();
    if(tr.length == 0){
      Swal.fire('Nenhum paciente chamado!', 'Não tem nenhum paciente chamado na lista !', 'info');
      return;
    }else if(situacao != 'A caminho'){
      Swal.fire('Ação não permitida', 'Pacientes em atendimento ou já atendidos não podem voltar para a fila de espera !', 'info');
      return;
    }

      
    $.ajax({
      url: "/admin/appointment/update",
      data: {
        "_token" : $('meta[name="csrf-token"]').attr('content'),
        "appointment" : id_appointment,
        "status" : null
      },
      method: 'PUT',
      dataType: "json",
      success: function(data){
        var table;
        data.reverse();
        $.each(data, function(i, obj){
          switch (obj.status) {
            case null:
              table += '<tr>'+
              '<th scope="row">'+obj.ticket+'</th>'+
              '<td>'+obj.patient_name+'</td>'+
              '<td>'+obj.telefone+'</td>'+
              '<td>'+obj.doctor_name+'</td>'+
              '<td hidden="true">'+obj.id+'</td>'+
              '</tr>'
              break;
            default:
              break;
          }
        });
        $('#waitingroom').html(table).show();
      },
      error: function(data){
        console.log(data);
      }
    });

    tr.fadeOut(600, function() {	      tr.remove();  	    });	
  }

  setInterval(function(){
    var oldStatus;
    var status = Cookies.get('status_appointment');
    if(status != oldStatus){
      switch (status) {
        case "Em atendimento":
          $('#status_appointment').html('<i id="icon_status" class="fas fa-door-closed text-danger mr-3"></i> Em atendimento').show();
          break;
        case "Liberado":
          $('#status_appointment').html('<i id="icon_status" class="fas fa-door-open text-success mr-3"></i> Liberado').show();
          break;
        default:
          break;
      }
    }
    oldStatus = status;
  }, 1000);