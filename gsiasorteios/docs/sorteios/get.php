<?php 
  include ('../../header.php');

  if ( (isset($_GET['sor_sorteios_id'])) && (! empty($_GET['sor_sorteios_id'])) && (is_numeric($_GET['sor_sorteios_id'])) ) {
    $_GET['sor_sorteios_id'] = anti_injection($_GET['sor_sorteios_id']);

    $date_counter = $sorteios->getValue('sor_sorteio_data', $_GET['sor_sorteios_id']); 

    if (! $user->CheckLogin($session->data)) {
      echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
    }

    $gan_registro = $ganhadores->CheckGanhador($_GET['sor_sorteios_id']);

    $count_participantes = count($participantes->getCountSorteios($_GET['sor_sorteios_id']));
  } else {
    echo "<script>document.location.href='" . DIR_DOCS . "sorteios/index.php?type=1'</script>";
  }
?>  
      <?php
        if ( (isset($date_counter)) && (! empty($date_counter)) ) {
          $date_counter = GetTimeInterval(date('d/m/Y H:i:s', strtotime($date_counter)));
 
          $registro = $sorteios->getRegistro($_GET['sor_sorteios_id']);

          if ($registro['sor_sorteio_status'] == '0') {
      ?>
          <section id="top-a" class="grid-block">
            <div class="grid-box width100 grid-h">
              <div class="module   deepest">
                <div id="block-main">
                  <div class="wrapper clearfix">      
                    <div class="text-center">
                      <div class="quote">
                        <div id="counter"> </div>
                        <div class="desc">
                          <div>Dias</div>
                          <div>Horas</div>
                          <div>Minutos</div>
                          <div>Segundos</div>
                        </div>
                      </div>
                    </div>    
                  </div>
                </div>
              </div>
            </div> 
          </section>
        <?php } else { ?>
          <div class="grid-box width100 grid-h">
            <div class="module   deepest">
              <div id="block-main">
                <div class="wrapper clearfix">      
                  <div class="text-center">
                    <?php if ($registro['sor_sorteio_status'] == '0') { ?>
                      <span class="label label-success" style="font-family: Comic Sans MS; font-size: 20px;">
                        PENDENTE
                      </span>
                    <?php } else { ?>
                      <span class="label label-danger" style="font-family: Comic Sans MS; font-size: 20px;">
                        SORTEIO FINALIZADO
                      </span>
                     <?php } ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      <?php } ?>
        
        <section id="bottom-a" class="grid-block">
          <?php
            if ( (isset($date_counter)) && (! empty($date_counter)) ) {
          ?>

            <div class="grid-box width100 grid-h">
              <div class="module mod-inset  deepest">    
                <div id="block-main">
                  <div class="wrapper clearfix">  
                    <img class="float-left" style="margin-right: 15px;" src="<?php echo $registro['pro_produto_imagem']; ?>" width="250" height="250" alt="Demo" />
                    <?php if ($registro['sor_sorteio_status'] == '0') { ?>
                      <a class="button-default float-right" style="margin-top: 7px;" href="javascript:CheckUserSorteio('<?php echo $registro['pro_produto_nome']; ?>', '<?php echo $user->getId(); ?>', '<?php echo $registro['sor_sorteios_id']; ?>')" title="Participar">
                        Participar
                      </a>
                    <?php } ?>
                    <h3 style="margin: 0 0 4px 0; padding-top: 5px;">
                      <?php echo $registro['pro_produto_nome']; ?>
                    </h3>
                    <p class="remove-margin">
                      <div class="grid-box width60 grid-h">
                        <?php echo utf8_encode($registro['pro_produto_detalhes']); ?>
                      </div>
                      <br>
                      <br>
                      <b><i><label class="float-left"> Nº de Participantes: <span class="text-success"><?php echo $count_participantes; ?></span></label></i></b>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php } else { ?>

              <div class="grid-box width100 grid-h">
                <div class="module mod-inset  deepest">
                  <div class="text-center">
                    <span class="text-warning"> Nenhum dado foi encontrado para este sorteio!</span>
                  </div>
                </div>
              </div>
            <?php } ?>
        </section>
        <?php if (! empty($gan_registro)) { ?>
          <div class="box-note">
            <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>
              <h3 class="toggler">Ganhador: <?php echo $gan_registro['act_account_nome']; ?> <?php echo $gan_registro['act_account_sobrenome']; ?> - [<?php echo date('d/m/Y H:i:s', strtotime($gan_registro['gan_data_registro'])); ?>] 
                <div class="pull-right">
                  <ul class="social-icons"> 
                    <li class="googleplus">
                      <a href="#"> </a>
                    </li>
                  </ul>
                </div>
              </h3>
              <div class="content wk-content clearfix" style="overflow: hidden; min-height: 143px; height: 0px; display: none; font-size: 20px;">
                <h3 class="text-center text-success" style="margin: 0 0 4px 0; padding-top: 5px;">
                  Parabéns <b><?php echo $gan_registro['act_account_nome']; ?> <?php echo $gan_registro['act_account_sobrenome']; ?> </b>!
                </h3>
                <br>
                <span class="text-center">
                  Você é o ganhador do sorteio Nº <b><?php echo $registro['sor_sorteios_id']; ?></b>
                </span>
                <br>
                <br>
                <b><i>Prêmio:</i></b> <?php echo $registro['pro_produto_nome']; ?>
                <br>
                <b><i>Sorteio realizado em:</i></b> <?php echo date('d/m/Y H:i:s', strtotime($gan_registro['gan_data_registro'])); ?>
                <br>
                <br>
                <?php if (! empty($gan_registro['gan_ganhador_imagem'])) { ?>
                  <img style="margin-left: 20%;" src="<?php echo $gan_registro['gan_ganhador_imagem']; ?>" width="536" height="307" alt="Demo" />
                <?php } ?>
                <br>
                <br>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(function(){
      $('#counter').countdown({
        image: '<?php echo DIR_IMAGEN; ?>digits.png',
        startTime: "<?php echo $date_counter['days']; ?>:<?php echo $date_counter['hours']; ?>:<?php echo $date_counter['minutes']; ?>:<?php echo $date_counter['seconds']; ?>",
        timerEnd: function(){ CheckSorteio('<?php echo $registro["sor_sorteios_id"]; ?>'); }
      });
    });

    //Verifica o ganhador do Sorteio
    function CheckSorteio(sorteios_id) {
      if ('<?php echo $registro['sor_sorteio_status']; ?>' == '0') {
        $.ajax({
          url: app.base + "docs/sorteios/sortear.php",
          data: {sor_sorteios_id: sorteios_id},
          dataType: "json",
          success: function(data){
            if (data != 'ERROR') {
              $("#div_info_process").html('ATENÇÃO!!!! E O GANHADOR DESTE SORTEIO É.....<br>');
              setTimeout('$("#div_info_process").append(\'<b><span class="text-danger" style="font-size: 20px;"> ' + data['act_account_nome'] + ' ' + data['act_account_sobrenome'] + ' </span></b> !!!!! <br> PARABENS!!!!\')', 3000);
              $("#div_info_process").fadeIn(1000);
              $("#div_info_process").removeClass('box-warning');
              $("#div_info_process").addClass('box-success');
              setTimeout('window.location.reload()', 10000);  
            } else {
              $("#div_info_process").html('ERRO AO REALIZAR O SORTEIO! POR FAVOR INFORME Á NOSSA EQUIPE O OCORRIDO.');
              $("#div_info_process").fadeIn(1000);
              $("#div_info_process").removeClass('box-success');
              $("#div_info_process").addClass('box-warning'); 
            }
          }
        });   
      }
    }
    //$('#ModalSorteio').modal('show');
</script>
<?php include ('../../footer.php'); ?>