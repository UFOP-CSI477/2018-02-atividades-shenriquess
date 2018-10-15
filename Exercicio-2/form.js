function validarCampo(campo, alerta, label) {

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

function validarCampo2(campo, alerta, label) {

  var valida = $(campo + " option:selected").val();
  if ( valida == 0 ) {
    // Exibe o alerta
    $(alerta).slideDown();
    // Adiciona CSS de erro - input
    $(label).addClass("text-danger");
    // Abandonar a execução
    return false;
  }

  $(alerta).hide();
  // Remover as classes de erro

  $(label).removeClass("text-danger");

  return true;

}


$(document).ready(function(){

  // Vincular ação ao botão de cálculo
  $("#btnEnviar").click(function(){
      validarCampo("input[name='nome']", "#alertaNome", "#labelNome");
      validarCampo("input[name='endereco']", "#alertaEnd", "#labelEnd");
      validarCampo("input[name='telefone']", "#alertaTel", "#labelTel");
      validarCampo("input[name='email']", "#alertaEmail", "#labelEmail");
      validarCampo("input[name='usuario']", "#alertaUsuario", "#labelUsuario");
      validarCampo("input[name='senha']", "#alertaSenha", "#labelSenha");
      validarCampo2("#idCidade", "#alertaCidade", "#labelCidade");
      if (!$("#integral").prop( "checked") && !$("#parcial").prop( "checked") && !$("#creche").prop( "checked")){
        $("#alertaModal").slideDown();
        // Adiciona CSS de erro - input
        $("#idModal").addClass("text-danger");
        // Abandonar a execução
      }

      if (!$("#feminino").prop( "checked") && !$("#masculino").prop( "checked") && !$("#naobinario").prop( "checked")){
        $("#alertaGenero").slideDown();
        // Adiciona CSS de erro - input
        $("#idGenero").addClass("text-danger");
        // Abandonar a execução
      }


  });

  $("input[name='nome']").focusout(function(){
    validarCampo("input[name='nome']", "#alertaNome", "#labelNome");
  });

  $("#idCidade").change(function(){
    validarCampo2("#idCidade", "#alertaCidade", "#labelCidade");
  });

  $("input[name='endereco']").focusout(function(){
    validarCampo("input[name='endereco']", "#alertaEnd", "#labelEnd");
  });

  $("input[name='telefone']").focusout(function(){
    validarCampo("input[name='telefone']", "#alertaTel", "#labelTel");
  });

  $("input[name='email']").focusout(function(){
    validarCampo("input[name='email']", "#alertaEmail", "#labelEmail");
  });

  $("input[name='usuario']").focusout(function(){
    validarCampo("input[name='usuario']", "#alertaUsuario", "#labelUsuario");
  });

  $("input[name='senha']").focusout(function(){
    validarCampo("input[name='senha']", "#alertaSenha", "#labelSenha");
  });

  $("#integral").change(function(){
    $("#alertaModal").hide();
    // Adiciona CSS de erro - input
    $("#idModal").removeClass("text-danger");
  });

  $("#parcial").change(function(){
    $("#alertaModal").hide();
    // Adiciona CSS de erro - input
    $("#idModal").removeClass("text-danger");
  });

  $("#creche").change(function(){
    $("#alertaModal").hide();
    // Adiciona CSS de erro - input
    $("#idModal").removeClass("text-danger");
  });

  $("#feminino").change(function(){
    $("#alertaGenero").hide();
    // Adiciona CSS de erro - input
    $("#idGenero").removeClass("text-danger");
  });

  $("#masculino").change(function(){
    $("#alertaGenero").hide();
    // Adiciona CSS de erro - input
    $("#idGenero").removeClass("text-danger");
  });

  $("#naobinario").change(function(){
    $("#alertaGenero").hide();
    // Adiciona CSS de erro - input
    $("#idGenero").removeClass("text-danger");
  });

});
