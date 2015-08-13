<?php 
  include ('../../header.php');

  if ( (isset($_GET['type'])) && (! empty($_GET['type'])) && (is_numeric($_GET['type'])) ) {
    $_GET['type'] = anti_injection($_GET['type']);

    if ($_GET['type'] == '1') {
      $registros = $sorteios->getRegistros(false);  
    } else if ($_GET['type'] == '2') {
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $registros = $participantes->getRegistros($session->data['user']);   
    }
  } else {
    echo "<script>document.location.href='" . DIR_BASE . "'</script>";
  }
?>       
        <section id="bottom-a" class="grid-block">
          <?php
            if ( (isset($registros)) && (! empty($registros)) ) {

              foreach ($registros as $registro) { 
          ?>
              <div class="box-note">
                <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>
                  <h3 class="toggler"><?php echo $registro['pro_produto_nome']; ?> - [<?php echo date('d/m/Y H:i:s', strtotime($registro['sor_sorteio_data'])); ?>] 
                    <?php if ($registro['sor_sorteio_status'] == '0') { ?>
                      <span class="label label-success" style="font-family: Comic Sans MS; font-size: 12px;">
                        PENDENTE
                      </span>
                    <?php } else { ?>
                      <span class="label label-danger" style="font-family: Comic Sans MS; font-size: 12px;">
                        FINALIZADO
                      </span>
                     <?php } ?> 
                    <div class="pull-right">
                      <ul class="social-icons"> 
                        <li class="googleplus">
                          <a href="#"> </a>
                        </li>
                      </ul>
                    </div>
                  </h3>
                  <div class="content wk-content clearfix" style="overflow: hidden; min-height: 143px; height: 0px; display: none;">
                    <br>
                    <img class="float-left" style="margin-right: 15px;" src="<?php echo $registro['pro_produto_imagem']; ?>" width="225" height="142" alt="Demo" />
                    <h3 style="margin: 0 0 4px 0; padding-top: 5px;">
                      <?php echo $registro['pro_produto_nome']; ?>
                    </h3>
                    <p class="remove-margin">
                      <div class="grid-box width60 grid-h">
                        <?php echo utf8_encode($registro['pro_produto_detalhes']); ?>
                      </div>
                      <br>
                      <span class="pull-right">
                        <a class="btn btn-md btn-info"href="<?php echo DIR_DOCS; ?>sorteios/get.php?sor_sorteios_id=<?php echo $registro['sor_sorteios_id']; ?>" title="Ver mais">
                          Ver Informações
                        </a>
                      </span>
                    </p>
                    <br>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Goianésia Sorteios -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                         data-ad-client="ca-pub-9482231868965823"
                         data-ad-slot="5446192993"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
              <?php } ?>
            <?php } else { ?>
              <div class="grid-box width100 grid-h">
                <div class="module mod-inset  deepest">
                  <div class="text-center">
                    <span class="text-warning"> Nenhum sorteio foi encontrado!</span>
                  </div>
                </div>
              </div>
            <?php } ?>
        </section>
    <!--<div class="box-note">
          <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>
            <h3 class="toggler">nome noticia 
              <div class="float-right">
                <ul class="social-icons"> 
                  <li class="googleplus">
                    <a href="#"> </a>
                  </li>
                </ul>
              </div>
            </h3>
            <div class="content wk-content clearfix" style="overflow: hidden; min-height: 143px; height: 0px; display: none;">
              <p>assunto
                <br />
                <div align="right"> 
                  <q>
                    Publicado dia: 
                    <code>
                      data
                    </code> 
                    / Por: 
                    <code>
                      usuario
                    </code>
                  </q> 
                </div>     
              </p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(function(){
      $('#counter').countdown({
        image: '<?php echo DIR_IMAGEN; ?>digits.png',
        startTime: "<?php echo $date_counter['days']; ?>:<?php echo $date_counter['hours']; ?>:<?php echo $date_counter['minutes']; ?>:<?php echo $date_counter['seconds']; ?>"
      });
    });
</script>
<?php include ('../../footer.php'); ?>