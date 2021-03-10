// EX: https://www.consultacrm.com.br/api/index.php?tipo=crm&uf=PE&q=10273&chave=8355247303&destino=json
$(document).ready(function () {
    $("#crm").blur(function () {
        //Nova variável "crm" somente com dígitos.
        var crm = $(this).val().replace(/\D/g, '');
        var uf = $('#uf').val();
        //Verifica se campo cep possui valor informado.
        if (crm != "") {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#nome").val("Aguarde...");
            $("#situacao").val("Aguarde...");
            //Consulta o webservice consultacrm.com.br
            $.getJSON("https://www.consultacrm.com.br/api/index.php?tipo=crm&uf="+uf+"&q="+crm+"&chave=8355247303&destino=json", function (dados) {
                if (dados.item.length != 0) {
                    //Atualiza os campos com os valores da consulta.
                    $("#nome").val(dados.item[0].nome);
                    $("#situacao").val(dados.item[0].situacao);
                }
                else {
                    Swal.fire('Erro ao identificar o CRM', 'CRM não encontrado para o estado informado !', 'error')
                }
            });
        }
    });
});