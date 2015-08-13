<?php 
  include 'header.php';
?>
        <section id="top-a" class="grid-block">
          <div class="grid-box width100 grid-h">
            <div class="module   deepest">
              <div id="block-main">
                <div class="wrapper clearfix">			
                  <div class="text-center">
                    <div class="quote">
                      <h1>
                        <?php 
                          $result = $querys->GetConfig('cfg_texto_principal_quote');
                          echo utf8_encode($result['cfg_configuracoes_value']);
                        ?>  
                        <h2></h2>
                      </h1>
                    </div>
                  </div>		
                </div>
              </div>
            </div>
          </div> 
        </section>
        <!-- main end -->

        <section id="bottom-a" class="grid-block">
          <?php
            $registros = $sorteios->getRegistros(true); 

            foreach ($registros as $registro) { 
          ?>
            <div class="grid-box width50 grid-h">
              <div class="module mod-dotted  deepest">    
                <div class="frontpage">
                  <img class="float-left" style="margin-right: 15px;" src="<?php echo $registro['pro_produto_imagem']; ?>" width="60" height="60" alt="Demo" />
                  <a class="button-default float-right" style="margin-top: 7px;" href="javascript:CheckUserSorteio('<?php echo $registro['pro_produto_nome']; ?>', '<?php echo $user->getId(); ?>', '<?php echo $registro['sor_sorteios_id']; ?>')" title="Participar">
                    Participar
                  </a>
                  <h3 style="margin: 0 0 4px 0; padding-top: 5px;">
                    <?php echo $registro['pro_produto_nome']; ?>
                  </h3>
                  <p class="remove-margin">
                    <div class="grid-box width60 grid-h">
                      <?php echo utf8_encode($registro['pro_produto_detalhes']); ?>
                    </div>
                    <br>
                  </p>
                  <span class="float-right">
                    <?php 
                      $date_sorteio = $sorteios->getValue('sor_sorteio_data', $registro['sor_sorteios_id']);
                      $date_sorteio = date('d/m/Y H:i:s', strtotime($date_sorteio));

                      if ($date_sorteio) { 
                        $date = GetTimeInterval($date_sorteio);
                        
                        $sorteio_status = $sorteios->getValue('sor_sorteio_status', $registro['sor_sorteios_id']);

                        if ($sorteio_status == '1') {
                          echo  "<i><b>Tempo para o Sorteio: <span class='text-danger'>HOJE!</span></b></i>";
                        } else {
                          if ($date['total'] == '999') {
                            echo "<i><b>Tempo para o Sorteio: <span class='text-danger'>HOJE!</span></b></i>";
                          } else {
                            echo "<i><b>Tempo para o Sorteio: <span class='text-success'>" . $date['days']  . " dia(s), " . $date['hours'] . " hora(s)</span></b></i>";
                          }
                        }
                      }
                    ?>
                  </span>
                </div>    
              </div>
            </div>
          <?php
            } 
            if (empty($registros)) { 
          ?>
            <div class="grid-box width100 grid-h">
              <div class="box-info">
                <center>
                  Não há sorteios a serem realizados. Utilize o menu Sorteios para visualizar os já realizados.
                </center>
              </div>
            </div>
          <?php  
            }
          ?>
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
<?php include 'footer.php'; ?>