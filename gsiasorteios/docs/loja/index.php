<?php 
  include '../../header.php';

  $cadastros = new Cadastros;

  if (isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];
    $produto_valor_ofc = $_POST['produto'];
    $produto_count = $_POST['cnt_credit'];
    $user_info = $cadastros->getRegistros();
    $user_info = $user_info[0];
    $user_info['act_account_telefone1'] = str_replace("-", "", $user_info['act_account_telefone1']);
    $checkout = new Checkout;

    if ($produto_count == 0) {
      $produto_count = '1';
    }

    if ($produto_id == '0') {
      $valor_final = $produto_count*5;
      if ($valor_final == $produto_valor_ofc) {

        $data = array(  'pro_produtos_id'     =>  $produto_id,
                        'pro_produto_nome'    =>  utf8_decode('Crédito Personalizado'),
                        'pro_produto_valor'   =>  '5',
                        'produto_count'       =>  $produto_count,
                        'act_accounts_id'     =>  $user_info['act_accounts_id'],
                        'act_account_nome'    =>  $user_info['act_account_nome'],
                        'act_account_sobrenome' =>  $user_info['act_account_sobrenome'],
                        'act_account_ddd'     =>  substr($user_info['act_account_telefone1'], 0, 2),
                        'act_account_telefone1' =>  substr($user_info['act_account_telefone1'], 2, strlen($user_info['act_account_telefone1'])),
                        'act_account_email'   =>  'checkout@sandbox.pagseguro.com.br',
                        'act_account_cpf'     =>  $user_info['act_account_cpf'],
                        'act_account_rua'     =>  $user_info['act_account_rua'],
                        'act_account_numero'  =>  $user_info['act_account_numero'],
                        'act_account_bairro'  =>  $user_info['act_account_bairro']
                      );

        $checkout->SendPayment($data);

        echo '<center>
                <section id="top-b" class="grid-block">
                  <div class="module deepest box-success" >
                    <span class="text-success" style="font-size: 17px;"> 
                      <b>Sua compra está sendo processada, aguarde...</b>
                    </span>
                  </div>
                </section>
              </center>
              <br>
              <br>
              <br>
              <br>';
      } else {
        echo '<section id="top-b" class="grid-block">
                  <div class="text-center" style="font-size: 17px;">
                    <span class="text-danger">OCORREU UM ERRO AO PROCESSAR SUA COMPRA! </span><br>
                    <b>Você será redirecionado para a Loja novamente... Caso não seja redirecionado <a href="' . DIR_DOCS . 'loja/"> Clique Aqui </a></b>
                  </div>
                </section>';
          echo "<script>setTimeout('document.location.href=\'" . DIR_DOCS . "loja/\'', 3000)</script>";
          exit;
      }
    } else {
      $info = $produtos_info->getRegistro($_POST['produto_id']);

      if ( (isset($info)) && (! empty($info)) ) {
        $produto_valor = $info['pro_produto_valor'] - $info['pro_produto_desconto'];

        if ($produto_valor_ofc == $produto_valor) {

          $data = array(  'pro_produtos_id'     =>  $produto_id,
                          'pro_produto_nome'    =>  $info['pro_produto_nome'],
                          'pro_produto_valor'   =>  $produto_valor,
                          'produto_count'       =>  $produto_count,
                          'act_accounts_id'     =>  $user_info['act_accounts_id'],
                          'act_account_nome'    =>  $user_info['act_account_nome'],
                          'act_account_sobrenome' =>  $user_info['act_account_sobrenome'],
                          'act_account_ddd'     =>  substr($user_info['act_account_telefone1'], 0, 2),
                        'act_account_telefone1' =>  substr($user_info['act_account_telefone1'], 2, strlen($user_info['act_account_telefone1'])),
                          'act_account_email'   =>  'checkout@sandbox.pagseguro.com.br',
                          'act_account_cpf'     =>  $user_info['act_account_cpf'],
                          'act_account_rua'     =>  $user_info['act_account_rua'],
                          'act_account_numero'  =>  $user_info['act_account_numero'],
                          'act_account_bairro'  =>  $user_info['act_account_bairro']
                        );

          $checkout->SendPayment($data);

          echo '<center>
                  <section id="top-b" class="grid-block">
                    <div class="module deepest box-success" >
                      <span class="text-success" style="font-size: 17px;"> 
                        <b>Sua compra está sendo processada, aguarde...</b>
                      </span>
                    </div>
                  </section>
                </center>
                <br>
                <br>
                <br>
                <br>';
        } else {
          echo '<section id="top-b" class="grid-block">
                  <div class="text-center" style="font-size: 17px;">
                    <span class="text-danger">OCORREU UM ERRO AO PROCESSAR SUA COMPRA! </span><br>
                    <b>Você será redirecionado para a Loja novamente... Caso não seja redirecionado <a href="' . DIR_DOCS . 'loja/"> Clique Aqui </a></b>
                  </div>
                </section>';
          echo "<script>setTimeout('document.location.href=\'" . DIR_DOCS . "loja/\'', 3000)</script>";
          exit;
        }
      } 
    }  
  }
?>
        <section id="top-b" class="grid-block">
          <div class="module deepest box-success" >
            <div class="grid-box width25 grid-h">
              <div class="module mod-line deepest" style="top: 10px;">
                <code> Pedidos <label class="text-success">Aprovados</label>: <?php echo $vendas->getAprovadas($user->getId()); ?> </code>
              </div>
            </div>
            <div class="grid-box width25 grid-h">
              <div class="module mod-line deepest" style="top: 10px;">
                <code> Pedidos <label class="text-warning">Pendentes</label>: <?php echo $vendas->getPendentes($user->getId()); ?> </code>
              </div>
            </div>
            <div class="grid-box width25 grid-h">
              <div class="module mod-line deepest" style="top: 10px;">
                <code> Pedidos <label class="text-danger">Cancelados</label>: <?php echo $vendas->getCanceladas($user->getId()); ?> </code>
              </div>
            </div>
            <div class="grid-box width30 grid-h float-right">
              <div class="module deepest" style="font-size: 20px;">
                <pre> Créditos: <b><?php echo $cadastros->GetCreditCount($user->getId()); ?></b> </pre>
              </div>
            </div>
          </div>
        </section>

        <section id="content" class="grid-block">
          <form class="submission small style" id="frmComprar" action="index.php" method="post" enctype="multipart/form-data">
            <?php 
              $produtos = $produtos_info->getRegistros();

              foreach ($produtos as $produto) { 
                $valor_desconto = $produto['pro_produto_valor'] - $produto['pro_produto_desconto'];

            ?>
              <div class="grid-box width25 grid-h">
                <div class="module mod-dotted deepest text-center" style="min-height: 250px;">
                  <img src="<?php echo DIR_IMAGEN; ?><?php echo $produto['pro_produto_imagem']; ?>" width="153px" height="102px">
                  <br>
                  <br>
                  <code class="text-info"> <?php echo utf8_encode($produto['pro_produto_nome']); ?> <br> - <b>Desconto de <?php echo $produto['pro_produto_desconto']; ?> reais</b></code>
                  <br>
                  <br>
                  De: <span style="font-size: 25px;" class="text-danger"><del> R$ <?php echo $produto['pro_produto_valor']; ?>,00 </del></span>
                  <br>
                  Por: <span style="font-size: 20px;" class="text-success"><b> R$ <?php echo $valor_desconto; ?>,00 </b></span>
                  <br>
                  <input type="radio" name="produto" id="produto<?php echo $produto['pro_produtos_id']; ?>" value="<?php echo $valor_desconto; ?>" onclick="soma_total(<?php echo $produto['pro_produtos_id']; ?>)">
                </div>
              </div>
            <?php } ?>
            <div class="grid-box width30 grid-h col-md-offset-4">
              <div class="module mod-dotted deepest text-center" style="min-height: 250px;">
                <img src="<?php echo DIR_IMAGEN; ?>produtos/imagem_unico.png" width="153px" height="102px">
                <br>
                <br>
                <code class="text-info"> Crédito Único </code>
                <br>
                <span style="font-size: 18px;" class="text-success"><b> R$ 5,00 </b>Cada</span>
                <br>
                <br>
                <br>
                <input class="form_control" name="cnt_credit" id="cnt_credit" type="text" value="0" onchange="muda_valor_unitario(this.value, 5, 0);"/>
                <br>
                <input type="radio" name="produto" id="produto0" value="0" onclick="soma_total(0)">
              </div>
            </div>
            <input type="hidden" name="produto_id" id="produto_id" />
            <div class="grid-box width100 grid-h">
              <div class="module deepest">
                <div class="box-warning1"> 
                  <center>
                    <span id="div_valor_total" class="float-left text-warning" style="margin-top: 3%; font-size: 22px;">
                      Total: R$ 0,00
                    </span>
                    <a href="https://pagseguro.uol.com.br" target="_blank">
                      <img alt="Logotipos de meios de pagamento do PagSeguro" src="https://p.simg.uol.com.br/out/pagseguro/i/banners/pagamento/avista_estatico_550_70.gif" title="Este site aceita pagamentos com Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, saldo em conta PagSeguro e boleto." border="0">
                    </a>
                    <span class="float-right" style="margin-top: 2%;">
                      <a onclick="enviar();" class="btn btn-danger"> Finalizar Compra </a>
                    </span>
                  </center>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript"><!--
    var total_soma_produto = 0;
    var checado = 0;

    function soma_total(id) {
        var valor_produto = $('#produto' + id).val();

        if (id == 0 && $('#cnt_credit').val() == '0') {
            if ($('#produto' + id).is(':checked')) {      
                alert('Informe a quantidade de créditos!');
            }

            $('#produto' + id).prop("checked", false);
        
            return;
        }

        if ($('#produto0').is(':checked') == false) {
          $("#produto0").val('0');
          $("#cnt_credit").val('0');
        }

        if ($('#produto' + id).is(':checked')) {
            checado++;
            $("#produto_id").val(id);
            total_soma_produto = parseFloat(valor_produto);
        } 

        margin = 'margin-left: 20px;';

        // Escreve total
        $('#div_valor_total').html('Total: R$ ' + total_soma_produto + ',00');
    }

    function muda_valor_unitario(num, valor_unitario, id){
        var valor_antigo = $('#produto' + id).val();

        if (num != 0) {
            $('#produto' + id).prop("checked", true);

            soma_total(id);

            total = (num*valor_unitario);

            $('#div_valor_total').html('Total: R$ ' + float2moeda(total));
            $('#produto' + id).val(total);
            $('#produto_id').val('0');
        } else {
            $('#produto' + id).prop("checked", false);

            total = 5;

            $('#produto' + id).val('0');
            $('#div_valor_total').val('Total: R$ 0,00');
        }
    }

    function enviar() {
        var cont = 0;

        $("input[type=radio]").each(function() {
            if ($(this).is(":checked") == true) {
                cont++;
            }
        });

        // Verifica se existe modulo marcado
        if (cont != 0) {
            $('#frmComprar').submit();
        } else {
            alert('Selecione um produto!');
        }
    }
//--></script>

<?php include '../../footer.php'; ?>