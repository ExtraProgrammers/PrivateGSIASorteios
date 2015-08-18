<?php
	include ('../header.php');

	$checkout = new Checkout;

	if ( (isset($_GET)) && (! empty($_GET)) ) {
		if ( (isset($_GET['vnd_transaction_id'])) && 
			(! empty($_GET['vnd_transaction_id'])) ) {

			$transaction_id = anti_injection($_GET['vnd_transaction_id']);

			$content = $checkout->CheckTransaction($transaction_id);

			$checkout->VerifyTransaction($content);

			$vnd_status = $content->status;

			if ($vnd_status == '1') {
				$vnd_status = 'Aguardando pagamento';
			} else if ($vnd_status == '2') {
				$vnd_status = 'Em análise';
			} else if ($vnd_status == '3') {
				$vnd_status = 'Paga';
			} else if ($vnd_status == '4') {
				$vnd_status = 'Disponível';
			} else if ($vnd_status == '5') {
				$vnd_status = 'Em disputa';
			} else if ($vnd_status == '6') {
				$vnd_status = 'Devolvida';
			} else if ($vnd_status == '7') {
				$vnd_status = 'Cancelada';
			} else if ($vnd_status == '8') {
				$vnd_status = 'Chargeback debitado';
			} else if ($vnd_status == '9') {
				$vnd_status = 'Em contestação';
			}

			echo '<section id="bottom-a" class="grid-block">
					<div class="grid-box width50 grid-h col-md-offset-3">
			            <div class="module deepest">
			              <div class="box-success">
			                <span class="text-success"> <center>OBRIGADO PELA SUA COMPRA! </center> </span>
			                <br>
			                <center><span class="text-warning"><b> Dados da Compra: </b><br></span></center>
			                <b>ID da Transação:</b> ' . $content->code . ' <br>
			                <b>Status da Compra: </b>' . $vnd_status . '<br>
			                <b>Nome do Produto:</b> ' . $content->items->item->description . ' <br>
			                <b>Quantidade:</b> ' . $content->items->item->quantity . ' <br>
			                <b>Valor Total:</b> ' . $content->grossAmount . ' <br> ';
			                
		            if ($vnd_status != 'Paga') {
		            	echo '<center><a class="btn btn-default" target="_blank" href="' . $content->paymentLink . '"> Realizar Pagamento </a></center>';
		            } else {
		            	echo '<center><a class="btn btn-default" href="' . DIR_DOCS . 'loja/"> Voltar para Loja </a></center>';
		            }
			echo '        </div>
			            </div>
			          </div>
			      	</section>
			      </div>
			    </div>
			  </div>
			</div>';
		}
	}

	include ("../footer.php");
?>


