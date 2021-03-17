var oldId;
var intervalo;
var idConsulta;
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
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    oldId = id_appointment;
},1000);


function initAttendance(){
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

function saveAnamnesis() {
  $.ajax({
    url: "/admin/appointment/update",
    data: {
      "_token" : $('meta[name="csrf-token"]').attr('content'),
      "attendances": idAttendances,
      "anamnesis" : $("anamnesis").val()
    },
    method: 'PUT',
    dataType: "json"
  });
}