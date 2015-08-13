<?php 
  include '../../header.php';
?>
        <section id="bottom-a" class="grid-block">
          <div class="grid-box width100 grid-h">
            <div class="module deepest">		
              <div class="frontpage">
                <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>
                  <div class="box-info">
                    <center> 
                      <?php 

                        if ($user->isLoggedUser()) {
                          $user->logoutUser(); 
                        ?>
                          Você saiu da sua conta e será redirecionado para a página inicial.
                        <?php } else { ?>
                          Você não está logado. Redirecionando para a página inicial.
                        <?php }
                      ?>
                    </center>
                  </div>
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
    $(document).ready(function() {
      setTimeout('location.href="' + app.base + '"', 5000);
    });
  //--></script>
<?php include '../../footer.php'; ?>