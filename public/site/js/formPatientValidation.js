$('#cep').mask('00000-000');
    $('#datanascimento').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('(00) 0 0000-0000');
    $("#datanascimento").datepicker({
      format: "dd/mm/yyyy",
      language: "pt-BR",
      daysOfWeekDisabled: "0",
    });

    $('#datanascimento').blur(function (){
      var datanascimento = $(this).val();
      var data = datanascimento.split('/');
      var today = new Date();
      
      var idade = today.getFullYear() - data[2];
      
      if(today.getMonth()+1 < data[1]){
        idade--;
      }

      $('#idade').val(idade+" anos");
      
    });


    $('#cpf').blur(function () {
      cpf = $(this).val().replace(/\D/g, '');
      var Soma;
      var Resto;
      Soma = 0;
      if (cpf == ''){
          Swal.fire({icon: 'error', title: 'ERRO...', text: 'CPF em branco, por favor preencha o campo cpf !'});
          return;
      }
      if (cpf.length != 11){
          Swal.fire({icon: 'error', title: 'ERRO...', text: 'CPF invalido verifique se todos os numeros foram digitados !'});
          return;
      }

      // Elimina cpfs invalidos conhecidos
      if (cpf == "00000000000" ||
          cpf == "11111111111" ||
          cpf == "22222222222" ||
          cpf == "33333333333" ||
          cpf == "44444444444" ||
          cpf == "55555555555" ||
          cpf == "66666666666" ||
          cpf == "77777777777" ||
          cpf == "88888888888" ||
          cpf == "99999999999"){
          Swal.fire({icon: 'error', title: 'ERRO...', text: 'CPF invalido!'});
          return;
      }
         
      for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
      Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(cpf.substring(9, 10)) ) Swal.fire({icon: 'error', title: 'ERRO...', text: 'CPF invalido!'});
    
      Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
    
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(cpf.substring(10, 11) ) ) Swal.fire({icon: 'error', title: 'ERRO...', text: 'CPF invalido!'});
        return true;


    });