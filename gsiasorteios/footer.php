		<div id="block-footer">
			<div class="wrapper">
				<footer id="footer">
					<a id="totop-scroller" href="#page">
					</a>
					<div class="grid-box width50 grid-h">
						<div class="module   deepest">
							<ul class="menu menu-line">
								<li class="level1 item108">
									<a href="<?php echo DIR_BASE; ?>" class="level1">
										<span>Página Inicial</span>
									</a>
								</li>
								<li class="level1 item109">
									<a href="<?php echo DIR_DOCS; ?>sobre/" class="level1">
										<span>Como Funciona</span>
									</a>
								</li>
								<li class="level1 item110">
									<a href="index.php/joomla.html" class="level1">
										<span>Contato</span>
									</a>
								</li>
							</ul>		
						</div>
					</div>
					<div class="grid-box width50 grid-h">
						<div class="modulo deepest">
							<div class="grid-box width40 grid-h">
								<div class="fb-share-button" data-href="https://www.facebook.com/gsiasorteios" data-layout="button_count"></div>
							</div>	
							<div class="grid-box width50 grid-h">
								<div class="fb-like">
									<fb:like href="https://www.facebook.com/gsiasorteios" style="right: 30px;" layout="standard" show-faces="true" width="450" action="like" colorscheme="dark" />
								</div>
							</div>
						</div>
					</div>
					<div class="grid-box width50 grid-h">
						<div class="module   deepest">
							Goianésia Sorteios Copyright &copy; 2015  
							<a href="<?php echo DIR_BASE; ?>" target="_blank">
								GSIASorteios
							</a>	
						</div>	
					</div>
				</footer>
			</div>
		</div>	
		<script type="text/javascript"><!--
			function CheckUserSorteio(produto_nome, user_id, sorteio_id) {
				if (user_id == '') {
					$("#div_info_process").removeClass('box-success');
	                $("#div_info_process").addClass('box-warning');
					$("#div_info_process").html('Olá! Apenas contas registradas e confirmadas podem participar dos sorteios! <br> Você está sendo redirecionado para a página de cadastro...');
                	$("#div_info_process").fadeIn(1000);
                	setTimeout('location.href="' + app.base + 'docs/cadastro/"', 10000);	
				} else {
					$.ajax({
	                    type: "POST",
	                    url : app.base + "includes/join_customer.php",
	                    data: {act_accounts_id: user_id, sor_sorteios_id: sorteio_id},
	                    dataType : "html",

	                    success : function(data) { 
	                        if (data == '1') {
	                        	$("#div_info_process").html('Sucesso! Agora você está participando do sorteio de <b> ' + produto_nome + '</b>');
	                        	$("#div_info_process").fadeIn(1000);
	                        	$("#div_info_process").removeClass('box-warning');
	                        	$("#div_info_process").addClass('box-success');
	                        	setTimeout('javascript:$("#div_info_process").fadeOut(5000)', 5000);
	                        } else if (data == '2') {
	                        	$("#div_info_process").removeClass('box-success');
	                        	$("#div_info_process").addClass('box-warning');
	                        	$("#div_info_process").html('Ops! Você já está participando deste sorteio! Aguarde até o dia do sorteio e boa sorte!');
							    $("#div_info_process").fadeIn(1000);
	                        	setTimeout('javascript:$("#div_info_process").fadeOut(5000)', 5000);
	                        } else {
	                        	$("#div_info_process").removeClass('box-success');
	                        	$("#div_info_process").addClass('box-warning');
	                        	$("#div_info_process").html('Falha! :( Ocorreu um problema ao participar deste sorteio. Tente novamente mais tarde.');
							    $("#div_info_process").css('display', 'block');
	                        }
	                    }
	                });
				}
			}
		//--></script>	

		<script>
             (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
             (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
             m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
             })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
             ga('create', 'UA-58308346-2', 'auto');
             ga('send', 'pageview');
 
        </script>

	</body>
</html>