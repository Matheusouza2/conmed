$('#cep').mask('00000-000');
    $('#datanascimento').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('(00) 0 0000-0000');
    $("#datanascimento").datepicker({
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior'
    });

    document.getElementById('datanascimento').onblur = function () {
      var dataAtual = new Date();
      dataAtual.setMonth(dataAtual.getMonth());
      var data = $('#datanascimento').val().split('/');
      var dataFormat = data[1] +'/'+ data[0] +'/'+ data[2];
      var dataNascimento = new Date(dataFormat);
      ano = dataAtual.getFullYear() - dataNascimento.getFullYear();
      if(dataAtual.getMonth() < dataNascimento.getMonth()){
        ano--;
      }
      console.log(ano);
      if(ano > 0){
        $('#idade').val(ano+' Anos');
      }else{
        $('#idade').val('');
      }
    }