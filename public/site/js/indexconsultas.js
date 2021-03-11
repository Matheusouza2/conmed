$('#data').mask('00/00/0000');
$('#data').datepicker({
    format: "dd/mm/yyyy",
    language: "pt-BR",
    daysOfWeekDisabled: "0",
    startDate: "+1d"
  });

  $('#data').blur(function (){
    var data = $(this).val();
    if(data !== ""){
        
    }
    
  });