var oldId;
var intervalo;
var idConsulta;
var idAttendance;
var idPatient;
setInterval(function(){
    var id_appointment = Cookies.get('ticket');
    if(id_appointment != oldId){
        $.ajax({
            url: '/admin/appointment/showEspecific',
            data: {
                "_token" : $('meta[name="csrf-token"]').attr('content'),
                "ticket" : id_appointment
            },
            method: 'GET',
            dataType: 'json',
            success: function(data){
                idPatient = data[0].patient;
                $('#patientName').html('Nome do Paciente: '+data[0].nome).show();
                var datanascimento = data[0].datanascimento;
                var date = datanascimento.split('-');
                var today = new Date();
                
                var idade = today.getFullYear() - date[0];
                
                if(today.getMonth()+1 < date[1]){
                    idade--;
                }
                $('#patientAge').html('Idade: '+idade).show();
                $("#btnTime").attr("disabled", false);
                $.ajax({
                  url: 'atendimento/showAll',
                  data:{
                    'patient': idPatient
                  },
                  method: 'GET',
                  dataType: 'json',
                  success: function success(data2) {
                    var anam = "", exams = "", med = "";
                    $.each(data2, function(i,obj2) { 
                      anam += '<span class="badge badge-default badge-lg mb-2 mt-4">Data: '+obj2.data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</span>'+
                      '<textarea class="form-control" name="" id="" cols="40" rows="4" readonly>'+obj2.anamnesis+'</textarea>';
                      var dataLocal = obj2.data.replace(/(\d*)-(\d*)-(\d*).*/, '$1-$2-$3');
                      exams += '<span class="badge badge-default badge-lg mb-2 mt-4">Data: '+obj2.data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</span>'+
                      '<textarea class="form-control" name="" id="" cols="40" rows="4" readonly>'+obj2.exams+'</textarea>'+
                      '<a href="/atendimento/relatorio/'+obj2.id+'/exams" target="_blank" id="geraReceita" title="Clique para gerar a receita" class="btn btn-warning btn-sm my-4">Gerar Requirimento</a>';
                      
                      med += '<span class="badge badge-default badge-lg mb-2 mt-4">Data: '+obj2.data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</span>'+
                      '<textarea class="form-control" name="" id="" cols="40" rows="4" readonly>'+obj2.medicines+'</textarea>'+
                      '<a href="/atendimento/relatorio/'+obj2.id+'/meds" target="_blank" id="geraReceita" title="Clique para gerar a receita" class="btn btn-warning btn-sm my-4">Gerar Receita</a>';
                    });
                    $('#anam').html(anam).show();
                    $('#exam').html(exams).show();
                    $('#med').html(med).show();
                  },
                  error: function error(data) {
                    console.log(data);
                  }
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    oldId = id_appointment;
},1000);


function initAttendance(){
  $("#btnTime").html('<i class="fas fa-hourglass-half"></i> Aguarde...').show();
  $("#btnTime").removeClass('btn-success');
  $("#btnTime").addClass('btn-default');

  $.ajax({
    url: "/atendimento/store",
    data: {
      "_token" : $('meta[name="csrf-token"]').attr('content'),
      "ticket" : oldId,
    },
    method: 'POST',
    dataType: "json",
    success: function success(data) {
      if(data == 'error'){
        Swal.fire('Paciente já atendido', 'Esse paciente já foi atendido hoje, aguarda a recepção chamar outra senha.', 'info');
        $("#btnTime").html('<i class="fas fa-play"></i> Iniciar Consulta').show();
        $("#btnTime").removeClass('btn-default');
        $("#btnTime").addClass('btn-success');
        return;
      }
      $("#btnTime").html('<i class="fas fa-stop"></i> Encerrar Consulta').show();
      $("#btnTime").removeClass('btn-success');
      $("#btnTime").addClass('btn-danger');
      $("#btnTime").attr("onClick", "stopAttendance()");
      $.ajax({
        url: "/admin/appointment/update",
        data: {
          "_token" : $('meta[name="csrf-token"]').attr('content'),
          "appointment" : idConsulta,
          "status" : "Em atendimento"
        },
        method: 'PUT',
        dataType: "json"
      });
    
      Cookies.set('status_appointment', "Em atendimento");
      var s = 1;
      var m = 0;
      var h = 0;
      var min,hr,sec = "";
      intervalo = window.setInterval(function() {
        if (s == 60) { m++; s = 0; }
        if (m == 60) { h++; s = 0; m = 0; }
        h < 10? hr = "0" + h : hr = h;
        s < 10? sec = "0" + s : sec = s;
        m < 10? min = "0" + m : min = m;
        
        $("#tempo").html(hr+":"+min+":"+sec).show();
        
        s++;
      },1000);


    },
    error: function error(data) {
      console.log(data);
      alert("Error"+data);
    }
  });
}

function stopAttendance() {
  
  $("#btnTime").html('<i class="fas fa-play"></i> Iniciar Consulta').show();
  $("#btnTime").removeClass('btn-danger');
  $("#btnTime").addClass('btn-success');
  $("#btnTime").attr("onClick", "initAttendance()");
  $("#btnTime").attr("disabled", true);
  
  $.ajax({
    url: "/admin/appointment/update",
    data: {
      "_token" : $('meta[name="csrf-token"]').attr('content'),
      "appointment" : idConsulta,
      "status" : "Liberado"
    },
    method: 'PUT',
    dataType: "json"
  });

  Cookies.set('status_appointment', "Liberado");
  window.clearInterval(intervalo);

}

function saveField() {
  $.ajax({
    url: "/atendimento/update",
    data: {
      "_token" : $('meta[name="csrf-token"]').attr('content'),
      "anamnesis" : $("#anamnesis").val(),
      "exams" : $("#exams").val(),
      "medicines" : $("#medicines").val(),
      "patient": idPatient
    },
    method: 'POST',
    dataType: "json",
    success: function success(data) {
      if($("#medicines").val() != ""){
        $("#medicines").attr('readonly', true);
        $("#geraReceita").attr('hidden', false);
      }else if($("#exams").val() != ""){
        $("#exams").attr('readonly', true);
        $("#geraExame").attr('hidden', false);
      }else if($("#anamnesis").val() != ""){
        $("#anamnesis").attr('readonly', true);
      }
      console.log(data);
    },
    error: function error(data) {
      console.log(data);
    }
  });
}

function gerarRel(date, type) {
  $.ajax({
    url: 'atendimento/relatorio',
    data: {
      "_token" : $('meta[name="csrf-token"]').attr('content'),
      "data" : date,
      "type":type
    },
    method: 'GET',
    dataType: 'json',
    success: function success(data) {
      console.log(data);
    },
    error: function error(data) {
      console.log(data);
    }
  });
}