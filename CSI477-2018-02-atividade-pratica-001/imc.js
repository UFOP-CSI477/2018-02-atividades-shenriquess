function validarCampo(campo, alerta, label) {

  console.log("validarCampo: " + campo + " " + alerta + " " + label);

  // Validar campo
  var valor = parseFloat($(campo).val());

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

function dadosClassific(campo,valor) {

  if(valor < 18.5){
    $(campo).val("Subnutrição");
  }
  if(valor >= 18.5 && valor <= 24.9){
    $(campo).val("Peso Saudável");
  }
  if(valor >= 25.0 && valor <= 29.9){
    $(campo).val("Sobrepeso");
  }
  if(valor >= 30.0 && valor <= 34.9){
    $(campo).val("Obesidade grau 1");
  }
  if(valor >= 35.0 && valor <= 39.9){
    $(campo).val("Obesidade grau 2");
  }
  if(valor > 40.0){
    $(campo).val("Obesidade grau 3");
  }

}

function pesoIdeal(altura) {

  var minimo = $(altura).val() * $(altura).val() * 18.5;
  var maximo = $(altura).val() * $(altura).val() * 24.9;
  var arredMin = parseFloat(minimo.toFixed(2));
  var arredMax = parseFloat(maximo.toFixed(2));
  var newRow = $("<tr>");
  var cols = "";
  cols += '<td>' + $(altura).val() + ' m</td>';
  cols += '<td>' + arredMin + ' Kg</td>';
  cols += '<td>' + arredMax + ' Kg</td>';
  cols += '</td>';

  newRow.append(cols);
  $("#pesoideal-table").append(newRow);

}


$(document).ready(function(){

  // Vincular ação ao botão de cálculo
  // $("#btnCalcular").click(function(){
  //
  // });

  $('#idPeso').mask("000.0", {reverse: true});
  $('#idAltura').mask('0.00');
  $('#idValor').mask("000.0", {reverse: true});

  $("#btnCalculo").click(function(){

    if ( validarCampo("input[name='peso']", "#alertaPeso", "#labelPeso") &&
         validarCampo("input[name='altura']", "#alertaAltura", "#labelAltura")) {

           var n1 = parseFloat( $("input[name='peso']").val() );
           var n2 = parseFloat( $("input[name='altura']").val() );

           var res = n1 / (n2*n2);
           var arred = parseFloat(res.toFixed(1));

           // Apresentar o resultado
           $("input[name='valor']").val(arred);

           dadosClassific("#idClassificacao",arred);

           if ( !validarCampo("input[name='peso']", "#alertaPeso", "#labelPeso") &&
                !validarCampo("input[name='altura']", "#alertaAltura", "#labelAltura")) {
             window.alert("Entre com os dados primeiro!");
           }else{
             pesoIdeal("#idAltura");

             $("#btnCalculo").attr("disabled", true);
             $("#btnLimpar").attr("disabled", true);
             $("#idPeso").attr("disabled", true);
             $("#idAltura").attr("disabled", true);

           }


    } else {
      $("input[name='valor']").val("");
    }


  });


  $("#btnReiniciar").click(function(){
    location.reload();
  });

  $("input[name='peso']").focusout(function(){
    validarCampo("input[name='peso']", "#alertaPeso", "#labelPeso");
  });

  $("input[name='altura']").focusout(function(){
    validarCampo("input[name='altura']", "#alertaAltura", "#labelAltura");
  });



});
