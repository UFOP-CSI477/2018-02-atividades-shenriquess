function validarCampoString(campo, alerta, label) {

  console.log("validarCampo: " + campo + " " + alerta + " " + label);

  // Validar campo
  var valida = $(campo).val();

  // Valor 1 -- inválido
  if ( valida == "" ) {
    // Exibe o alerta
    $(alerta).slideDown();
    // Adiciona CSS de erro - input
    $(campo).addClass("is-invalid");
    // No label
    $(label).addClass("text-danger");
    // Limpar o campo
    $(campo).val("");
    // Definir o foco para o input
    $(campo).focus();
    // Abandonar a execução
    return false;
  }

  // Valor - correto

  // Oculta o alerta
  $(alerta).hide();
  // Remover as classes de erro
  $(campo).removeClass("is-invalid");
  $(label).removeClass("text-danger");
  // Adicionar classe de validade
  $(campo).addClass("is-valid");
  return true;

}

function posicaoLargada(campo, label, dados) {

  if (dados.length === 0) {
    return true;
  }else{
      for(var i = 0; i < dados.length; i++){
        if(dados[i][0]== $(campo).val()){
          window.alert("Essa posição já existe!");
          $(campo).addClass("is-invalid");
          // No label
          $(label).addClass("text-danger");
          // Limpar o campo
          $(campo).val("");
          // Definir o foco para o input
          $(campo).focus();
          // Abandonar a execução
          return false;
        }
      }

  }
  return true;

}

function validarCampoInt(campo, alerta, label) {

  console.log("validarCampo: " + campo + " " + alerta + " " + label);

  // Validar campo
  var valor = parseInt($(campo).val());

  // Valor 1 -- inválido
  if ( isNaN(valor) ) {
    // Exibe o alerta
    $(alerta).slideDown();
    // Adiciona CSS de erro - input
    $(campo).addClass("is-invalid");
    // No label
    $(label).addClass("text-danger");
    // Limpar o campo
    $(campo).val("");
    // Definir o foco para o input
    $(campo).focus();
    // Abandonar a execução
    return false;
  }

  // Valor - correto

  // Oculta o alerta
  $(alerta).hide();
  // Remover as classes de erro
  $(campo).removeClass("is-invalid");
  $(label).removeClass("text-danger");
  // Adicionar classe de validade
  $(campo).addClass("is-valid");
  return true;

}


function ordenaMatriz(dados) {
  var aux1;
  var aux2;
  var aux3;

  for(var i = 0; i < dados.length-1; i++){
    for(var j = i+1; j < dados.length; j++){
      if(parseInt(dados[i][2]) > parseInt(dados[j][2])){
        aux1 = dados[i][0];
        aux2 = dados[i][1];
        aux3 = dados[i][2];
        dados[i][0] = dados[j][0];
        dados[i][1] = dados[j][1];
        dados[i][2] = dados[j][2];
        dados[j][0] = aux1;
        dados[j][1] = aux2;
        dados[j][2] = aux3;
      }
      //window.alert(dados[i][1]);
    }

  }
  /*
  for(var i = 0; i < dados.length; i++){

      window.alert(dados[i][0] + " " + dados[i][1]  + " "  + dados[i][2]);


  }*/

  var count = 2;
  for(var i = 1; i < dados.length; i++){

      if(dados[0][2] == dados[i][2]){
         dados[i][3] = "Vencedor(a)";
         dados[i][4] = 1;
         count++;

       }else{
         dados[i][3] = "";
         dados[i][4] = count;
         count++;
       }
  }
  dados[0][3] = "Vencedor(a)";
  dados[0][4] = 1;

  return true;

}


function criaNovaTabela(dados){
  var newThead = $("<thead>")
  newThead +=  "<tr>"
  newThead +=  "<th>Posição</th>"
  newThead +=  "<th>Largada</th>"
  newThead +=  "<th>Competidor(a)</th>"
  newThead +=  "<th>Tempo(s)</th>"
  newThead +=  "<th>Resultado</th>"
  newThead +=  "</tr>"
  newThead +=  "</thead>"
  var cols = "";
  $("#competicao-table").append(newThead);

  for(var i = 0; i < dados.length; i++){
    var newRow = $("<tr>");
    var cols = "";
    cols += '<td>' + dados[i][4] + '</td>';
    cols += '<td>' + dados[i][0] + '</td>';
    cols += '<td>' + dados[i][1] + '</td>';
    cols += '<td>' + dados[i][2] + '</td>';
    cols += '<td>' + dados[i][3] + '</td>';
    cols += '</td>';

    newRow.append(cols);
    $("#competicao-table").append(newRow);
  }
  return true;
}


$(document).ready(function(){
  var z = 0;
  var total = 0;
  var matriz = new Array();
  // Vincular ação ao botão de cálculo
  $("#btnEnviar").click(function(){
      if(validarCampoInt("input[name='posicao']", "#alertaPosicao", "#labelPosicao")&&
      validarCampoString("input[name='nome']", "#alertaNome", "#labelNome")&&
      validarCampoInt("input[name='tempo']", "#alertaTempo", "#labelTempo")&&
      posicaoLargada("input[name='posicao']", "#labelPosicao", matriz)&&
      total < 6){
      total++;
      var newRow = $("<tr>");
      var cols = "";
      cols += '<td>' + $("#idPosicao").val() + '</td>';
      cols += '<td>' + $("#idNome").val() + '</td>';
      cols += '<td>' + $("#idTempo").val() + '</td>';
      cols += '</td>';
      matriz[z] = [$("#idPosicao").val(), $("#idNome").val(), $("#idTempo").val()]

      z = z+1;
      newRow.append(cols);
      $("#competicao-table").append(newRow);
      $("#idPosicao").removeClass("is-valid");
      $("#idTempo").removeClass("is-valid");
      $("#idNome").removeClass("is-valid");
      $("#idPosicao").val("");
      $("#idNome").val("");
      $("#idTempo").val("");
    }else{
      if(total == 6){

        window.alert("São aceitos apenas 6 participantes por vez!");
      }
    }


  });

  $("#btnVencedor").click(function(){
    if (matriz.length === 0) {
      window.alert("Entre com os dados primeiro!");
    }else{
      $("#btnVencedor").attr("disabled", true);
      $("#btnEnviar").attr("disabled", true);
      $("#btnLimpar").attr("disabled", true);
      $("#idPosicao").attr("disabled", true);
      $("#idNome").attr("disabled", true);
      $("#idTempo").attr("disabled", true);
      ordenaMatriz(matriz);
      $("#competicao-table tr").remove();
      criaNovaTabela(matriz);
    }

  });

  $("#btnReiniciar").click(function(){
    location.reload();
  });

  $("input[name='posicao']").focusout(function(){
    validarCampoInt("input[name='posicao']", "#alertaPosicao", "#labelPosicao");
  });



  $("input[name='nome']").focusout(function(){
    validarCampoString("input[name='nome']", "#alertaNome", "#labelNome");
  });

  $("input[name='tempo']").focusout(function(){
    validarCampoInt("input[name='tempo']", "#alertaTempo", "#labelTempo");
  });

});
