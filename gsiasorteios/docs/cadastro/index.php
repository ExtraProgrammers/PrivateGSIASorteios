<?php 
  include '../../header.php';
  include '../../classes/Cadastros.php'; 

  $querys = new Cadastros;
  $userdata = array();

  if ($user->isLoggedUser()) {
    $userdata = $querys->getRegistros();
    $userdata = $userdata[0];
    $userdata['act_account_cpf'] = FormatCPF($userdata['act_account_cpf']);
  }

  if (isset($_POST['confirm_form'])) {
    if ($_POST['confirm_form'] == '1') {
      if (isset($userdata['act_accounts_id'])) {
        if ($querys->EditRegistro($userdata['act_accounts_id'], $_POST)) {
          $C_Login = true;
        } else {
          $C_Login = false;
        }  
      } else {
        if (! $querys->CheckCPFExists(ClearCPF($_POST['act_account_cpf']))) {
          $CPF_Exists = false;
          if ($querys->AddRegistro($_POST)) { 
            $C_Login = true;
          } else {
            $C_Login = false;
          }  
        } else {
          $CPF_Exists = true;
        }
      }
    }
  }
?>
      <section id="bottom-a" class="grid-block">
        <div class="grid-box width100 grid-h">
          <div class="module mod-inset deepest">		
            <div class="frontpage">
              <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>
                <?php 
                if (isset($C_Login)) { 
                  if ($C_Login) { ?>
                    <div class="box-info">
                      <?php if (! $CPF_Exists) { ?>
                        <?php echo (isset($userdata['act_accounts_id'])) ? 'Cadastro alterado com sucesso!' : 'Cadastro Efetuado com sucesso! <br> Utilize o seu e-mail e senha para fazer o login e clique nos botões "Participar" para participar dos sorteios.'; ?>
                      <?php } else { ?>
                        Conta já cadastrada! <br> Utilize o seu e-mail e senha para fazer o login e clique nos botões "Participar" para participar dos sorteios.
                      <?php } ?>
                      <?php 
                        echo "<script>setTimeout('location.href=\"' + app.base + 'docs/cadastro/\"', 6000);</script>"; 
                      ?>
                    </div>
                  <?php } else { ?>
                    <div class="box-warning">
                      <?php echo (isset($userdata['act_accounts_id'])) ? 'Ocorreu um problema ao alterar o seu cadastro, tente novamente!"' : 'Ocorreu algum problema no seu cadastro, tente novamente!'; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <h2>
                  <center> 
                    <?php if (! empty($userdata)) { ?>
                      Alteração de dados cadastrais
                    <?php } else { ?>
                      Registre-se para participar dos Sorteios!
                    <?php } ?> 
                  </center>
                </h2>
                <br>
                  <div class="box-warning" id="error_box" style="display: none;"> </div>
                <br>
                <section id="bottom-b" class="grid-block">
                  <form class="submission small style" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return validaCampos();">
                    <div class="grid-box width50 grid-h">
                      <div class="module mod-dotted deepest">
                        <div>
                          <label> Nome: </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_nome'])) ? 'value="' . $userdata["act_account_nome"] . '"' : ''; ?> id="act_account_nome" name="act_account_nome" size="15" required/>
                        </div>
                        <br>
                        <div>
                          <label> Sobrenome: </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_sobrenome'])) ? 'value="' . $userdata["act_account_sobrenome"] . '"' : ''; ?> id="act_account_sobrenome" name="act_account_sobrenome" size="25" required />
                        </div>
                        <br>
                        <div>
                          <label> 
                            CPF:<span class="star">&nbsp;*</span>  
                          </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_cpf'])) ? 'value="' . $userdata["act_account_cpf"] . '"' : ''; ?> id="act_account_cpf" name="act_account_cpf" maxlength="15" size="20" onChange="return validarCPF(this.value)" OnKeyPress="formatar('###.###.###-##', this)" required />
                          <span class="box-warning" style="display: none;" id="error_act_account_CPF"></span>
                        </div>
                        <br>
                        <div>
                          <label> 
                            E-mail:<span class="star">&nbsp;*</span> 
                          </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_email'])) ? 'value="' . $userdata["act_account_email"] . '"' : ''; ?> id="act_account_email" name="act_account_email" maxlength="200" size="30" required />
                          <span class="box-warning" style="display: none;" id="error_act_account_email"></span>
                        </div>
                        <br>
                        <div>
                          <label> 
                            Confirmar E-mail:<span class="star">&nbsp;*</span> 
                          </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_email'])) ? 'value="' . $userdata["act_account_email"] . '"' : ''; ?> id="act_account_email_confirm" name="act_account_email_confirm" maxlength="200" size="30" required />
                        </div>
                        <br>
                        <div>
                          <label> 
                            Senha:<span class="star">&nbsp;*</span> 
                          </label>
                          <input class="float-right" type="password" id="act_account_senha" name="act_account_senha" maxlength="15" size="25" required />
                          <span class="box-warning" style="display: none;" id="error_act_account_senha"></span>
                        </div>
                        <br>
                        <div>
                          <label>
                            Confirmar Senha:<span class="star">&nbsp;*</span>
                          </label>                
                          <input class="float-right" type="password" id="act_account_senha_confirm" name="act_account_senha_confirm" class="required" maxlength="15" size="25" required>                             
                        </div>
                        <br>
                      </div>
                    </div>   
                    <div class="grid-box width50 grid-h">
                      <div class="module mod-dotted deepest">
                        <div>
                          <label for="username"> 
                            Endereço:<span class="star">&nbsp;*</span>  
                          </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_rua'])) ? 'value="' . $userdata["act_account_rua"] . '"' : ''; ?> id="act_account_rua" name="act_account_rua" size="40" required />
                        </div>
                        <br>
                         <br>
                        <div>
                          <label> 
                            Bairro:<span class="star">&nbsp;*</span>  
                          </label>
                          <input style="margin-left: 10px;" type="text" <?php echo (isset($userdata['act_account_bairro'])) ? 'value="' . $userdata["act_account_bairro"] . '"' : ''; ?> id="act_account_bairro" name="act_account_bairro" size="20" required />

                          <label style="margin-left: 40px;" for="senha"> 
                            Nº:<span class="star">&nbsp;*</span>  
                          </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_numero'])) ? 'value="' . $userdata["act_account_numero"] . '"' : ''; ?> id="act_account_numero" name="act_account_numero" size="10" required />
                        </div>
                        <br>
                        <div>
                          <label> 
                            Telefone:  
                          </label>
                          <input style="margin-left: 5px;" type="text" <?php echo (isset($userdata['act_account_telefone1'])) ? 'value="' . $userdata["act_account_telefone1"] . '"' : ''; ?> id="act_account_telefone1" name="act_account_telefone1" maxlength="13" size="15" OnKeyPress="formatar('##-####-####', this)" required />

                          <label> Telefone 2: </label>
                          <input class="float-right" type="text" <?php echo (isset($userdata['act_account_telefone2'])) ? 'value="' . $userdata["act_account_telefone2"] . '"' : ''; ?> id="act_account_telefone2" name="act_account_telefone2" maxlength="13" size="15" OnKeyPress="formatar('##-####-####', this)" />
                        </div>
                        <br>
                        <input type="hidden" id="confirm_form" name="confirm_form" value="0" />
                        <div class="button float-right" style="margin-top: 50px;">
                          <button class="button-primary" type="submit"> <?php echo (! empty($userdata)) ? 'Salvar Dados' : 'Registrar-se'; ?> </button>
                        </div>
                      </div>   
                    </div>
                  </form>
                </section>
              </div>
            </div>		
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
</div>

<script type="text/javascript"><!--
  var UserLogged = "<?php echo $user->isLoggedUser(); ?>";
  var IDUserLogged = "<?php echo $user->getId(); ?>";

  function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)
    
    if (texto.substring(0,1) != saida){
      documento.value += texto.substring(0,1);
    }
  }

  function validarCPF( cpf ){
    var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;

    if(!filtro.test(cpf))
    {
      window.alert("CPF inválido. Tente novamente.");
                  document.form.act_account_cpf.value = '';
                  document.form.act_account_cpf.focus();
                  return false;
    }
     
    cpf = remove(cpf, ".");
    cpf = remove(cpf, "-");
    
    if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
      cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
      cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
      cpf == "88888888888" || cpf == "99999999999")
    {
      window.alert("CPF inválido. Tente novamente.");
                  document.form.act_account_cpf.value = '';
                  document.form.act_account_cpf.focus();
                  return false;
     }

    soma = 0;
    for(i = 0; i < 9; i++)
    {
      soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    
    resto = 11 - (soma % 11);
    if(resto == 10 || resto == 11)
    {
      resto = 0;
    }
    if(resto != parseInt(cpf.charAt(9))){
      window.alert("CPF inválido. Tente novamente.");
                  document.form.act_account_cpf.value = '';
                  document.form.act_account_cpf.focus();
                  return false;
    }
    
    soma = 0;
    for(i = 0; i < 10; i ++)
    {
      soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    if(resto == 10 || resto == 11)
    {
      resto = 0;
    }
    
    if(resto != parseInt(cpf.charAt(10))){
      window.alert("CPF inválido. Tente novamente.");
                  document.form.act_account_cpf.value = '';
                  document.form.act_account_cpf.focus();
                  return false;
    }
    
    return true;
   }
   
  function remove(str, sub) {
    i = str.indexOf(sub);
    r = "";
    if (i == -1) return str;
    {
      r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
    }
    
    return r;
  }
  function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
  }

  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
  }

  $('#act_account_cpf').change(function() {
    CheckCPF($("#act_account_cpf").val());
  });

  $('#act_account_email').change(function() {
    CheckEmail($("#act_account_email").val());
  });

  $('#act_account_senha').change(function() {
    ConfirmValues('act_account_senha_confirm');
  });

  $('#act_account_senha_confirm').change(function() {
    ConfirmValues('act_account_senha');
  });

  $('#act_account_email').change(function() {
    ConfirmValues('act_account_email');
  });

  $('#act_account_email_confirm').change(function() {
    ConfirmValues('act_account_email');
  });

  function validaCampos() {
      var count = 0;

      $(".error_active").each(function(){
        campo_id = $(this).attr('id');

        $("#error_box").html('Verifique os erros e tente novamente.');
        $("#error_box").css('display', 'block');
        
        count++;
      });

      if (count > 0) {
        return false;
      } else {
        document.getElementById('confirm_form').value = '1';
        return true;
      }
       
  }

  function CheckCPF(cpf) {
      var resultado = '';

      cpf = remove(cpf, ".");
      cpf = remove(cpf, "-");

      $.ajax({
          type: "POST",
          url : app.base + "includes/check_cpf.php",
          data: {acc_cpf:cpf, logged_id:IDUserLogged},
          dataType: "html",

        success: function(result){
          if (result != 0) {
              $("#error_act_account_CPF").html('O CPF inserido já existe!');
              $("#error_act_account_CPF").addClass('error_active');
              $("#error_act_account_CPF").css('display', 'block');      
          } else {    
              $("#error_act_account_CPF").removeClass('error_active');
              $("#error_act_account_CPF").css('display', 'none');    
          }
        }
      }); 
  }

  function CheckEmail(email) {
      var resultado = '';

      $.ajax({
          type: "POST",
          url : app.base + "includes/check_email.php",
          data: {acc_email:email, logged_id:IDUserLogged},
          dataType: "html",

        success: function(result){
          if (result != 0) {
            $("#error_act_account_email").html('E-mail já cadastrado!');
            $("#error_act_account_email").addClass('error_active already_exists');
            $("#error_act_account_email").css('display', 'block');      
          } else {    
            if ($("#error_act_account_email").hasClass("error_active already_exists")) {
              $("#error_act_account_email").removeClass('error_active already_exists');
            }   
          }
        }
      }); 
  }
  
  function ConfirmValues(campo_id) {
    if ( $("#" + campo_id).val() != $("#" + campo_id + "_confirm").val() ) {
      $("#error_" + campo_id).html('Os dados não conferem.');
      $("#error_" + campo_id).addClass('error_active');
      $("#error_" + campo_id).css('display', 'block');
    } else {
      if ($("#error_" + campo_id).hasClass("error_active already_exists")) {
      } else {
        $("#error_" + campo_id).removeClass('error_active already_exists');
        $("#error_" + campo_id).css('display', 'none');
      }
    }
  }
//--></script>

<?php include '../../footer.php'; ?>