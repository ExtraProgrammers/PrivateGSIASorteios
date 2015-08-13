<?php 
  include '../../header.php';
?>
        <section id="bottom-a" class="grid-block">
          <div class="grid-box width100 grid-h">
            <div class="module deepest">    
              <div class="frontpage">
                <div id="accordion-30-5317bb4873dca" class="wk-accordion wk-accordion-default clearfix" style="width: 1000px;" data-widgetkit="accordion" data-options='{"style":"default","collapseall":1,"matchheight":1,"index":99999999,"duration":500,"width":500}'>                 
                  <center> 
                    
                      <?php 
                        if ( (isset($_POST['act_account_email'])) AND (isset($_POST['act_account_senha'])) ) {
                          if ($user->isLoggedUser()) { ?>
                            <div class="box-info">
                              Você já está logado e será redirecionado para a página anterior.
                            </div>
                          <?php } else {
                            if ($user->loginUser($_POST['act_account_email'], $_POST['act_account_senha'])) { ?>
                              <div class="box-info">
                                Logado com sucesso! Redirecionando para a página anterior...
                              </div>  
                            <?php } else { ?>
                              <div class="box-info">
                                Dados incorretos! Tente novamente.
                              </div>
                            <?php } 
                          } 
                        } else {
                      ?>
                    

                    <section id="bottom-b" class="grid-block">
                      <form class="submission small style" action="index.php" method="post" enctype="multipart/form-data">
                        <div class="grid-box width40 grid-h">
                          <div class="module deepest mod-box" style="left: 80%;">
                            <div align="center">
                              <h2> LOGIN</h2>
                              <br>
                              <label class="float-left"> 
                                E-mail:<span class="star">&nbsp;*</span> 
                              </label>
                              <input type="text" id="act_account_email" name="act_account_email" maxlength="200" size="30" required />
                            </div>
                            <br>
                            <div>
                              <label class="float-left"> 
                                Senha:<span class="star">&nbsp;*</span> 
                              </label>
                              <input type="password" id="act_account_senha" name="act_account_senha" maxlength="15" size="30" required />
                            </div>
                            <div class="button float-right" style="margin-top: 20px;">
                              <button class="button-primary" type="submit"> Entrar </button>
                            </div>
                          </div>
                        </div>   
                      </form>
                    </section>
                    <?php } ?>
                  </center>
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
      if ("<?php echo $_POST['act_account_email']; ?>" != '') {
        setTimeout('javascript:window.history.go(-1)', 3000);
      }
    });
  //--></script>
<?php include '../../footer.php'; ?>