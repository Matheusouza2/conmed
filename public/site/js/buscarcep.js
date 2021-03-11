$(document).ready(function () {
    // function limpa_formulário_cep() {
    //     // Limpa valores do formulário de cep.
    //     $("#logradouro").val("");
    //     $("#bairro").val("");
    //     $("#cidade").val("");
    //     $("#estado").val("");
    // }
    //Quando o campo cep perde o foco.
   
    $("#cep").blur(function () {
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if (validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("Aguarde...");
                $("#bairro").val("Aguarde...");
                $("#cidade").val("Aguarde...");
                $("#uf").val("Aguarde...");
                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#cidade").attr('readonly', true);
                        $("#uf").attr('readonly', true);
                    } //end if.
                    else {
                        Swal.fire('Erro ao identificar o CEP', 'CEP não encontrado, coloque um CEP valido e tente novamente', 'error')
                    }

                });
            }
        }
    });
});