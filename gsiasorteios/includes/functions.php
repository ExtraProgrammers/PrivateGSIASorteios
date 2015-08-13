<?php
	function anti_injection($sql)
	{
		$sqlWords = "/([Ff][Rr][Oo][Mm]|[Ss][Ee][Ll][Ee][Cc][Tt]|[Cc][Oo][Uu][Nn][Tt]|[Tt][Rr][Uu][Nn][Cc][Aa][Tt][Ee]|[Ee][Xx][Pp][Ll][Aa][Ii][Nn]|[Ii][Nn][Ss][Ee][Rr][Tt]|[Dd][Ee][Ll][Ee][Tt][Ee]|[Ww][Hh][Ee][Rr][Ee]|[Uu][Pp][Dd][Aa][Tt][Ee]|[Ee][Mm][Pp][Tt][Yy]|[Dd][Rr][Oo][Pp] [Tt][Aa][Bb][Ll][Ee]|[Ll][Ii][Mm][Ii][Tt]|[Ss][Hh][Oo][Ww] [Tt][Aa][Bb][Ll][Ee][Ss]|[Oo][Rr]|[Oo][Rr][Dd][Ee][Rr] [Bb][Yy]|#|\*|--|\\\)/";
		// remove palavras que contenham sintaxe sql
		$sql = preg_replace($sqlWords,"",$sql);
		$sql = trim($sql); //limpa espaços vazio
		$sql = strip_tags($sql); //tira tags html e php
		$sql = addslashes($sql); //Adiciona barras invertidas a uma string
		return $sql;
	}

	function FormatCPF($cpf) {
		$part1 = substr($cpf, 0, 3);
		$part2 = substr($cpf, 3, 3);
		$part3 = substr($cpf, 6, 3);
		$part4 = substr($cpf, 9, 2);

		$cpf = $part1 . '.' . $part2 . '.' . $part3 . '-' . $part4;
		
		return $cpf;
	}

	function ClearCPF($cpf) {
		$part1 = substr($cpf, 0, 3);
		$part2 = substr($cpf, 4, 3);
		$part3 = substr($cpf, 8, 3);
		$part4 = substr($cpf, 12, 2);

		$cpf = $part1 . $part2 . $part3 . $part4;

		return $cpf;
	}

	function GetTimeInterval($date) {
		date_default_timezone_set('America/Sao_Paulo');
 		$hoje_inicio = date('d/m/Y');
		$hoje_fim = date('m/d/Y', strtotime($date));

		$inicio = date('d/m/Y H:i:s');
		$fim = $date;

		$inicio = DateTime::createFromFormat('d/m/Y H:i:s', $inicio);
		 
		$fim = DateTime::createFromFormat('d/m/Y H:i:s', $fim);
		 
		// Calcula a diferença entre as duas datas
		$intervalo = $inicio->diff($fim);

		if (strtotime($hoje_inicio) == strtotime($hoje_fim)) {
			// datas de modo formatado
			$result = array( 'days'		 => $intervalo->format('%D'),
						      'hours' 	 => $intervalo->format('%H'),
						      'minutes'  => $intervalo->format('%I'),
						      'seconds'  => $intervalo->format('%S'),
						      'total' 	 => '999');
		} else {
			// datas de modo formatado
			$result = array( 'days'		 => $intervalo->format('%D'),
						      'hours' 	 => $intervalo->format('%H'),
						      'minutes'  => $intervalo->format('%I'),
						      'seconds'  => $intervalo->format('%S'),
						      'total' 	 => '-');	
		}
		


		return $result;

	}

	function GerarSorteio($data = array()) {
		$data['count'] = ((int)$data['count'] - 1);

		$registro[0] = mt_rand(0, (int)$data['count']);		
		$registro[1] = mt_rand(0, (int)$data['count']);		
		$registro[2] = mt_rand(0, (int)$data['count']);		
		$registro[3] = mt_rand(0, (int)$data['count']);		
		$registro[4] = mt_rand(0, (int)$data['count']);		
		$registro[5] = mt_rand(0, (int)$data['count']);		
		$registro[6] = mt_rand(0, (int)$data['count']);		
		$registro[7] = mt_rand(0, (int)$data['count']);		
		$registro[8] = mt_rand(0, (int)$data['count']);		
		$registro[9] = mt_rand(0, (int)$data['count']);

		/* DEBUG SORTEIO
		echo '[0] ' . $registro[0] . '<br>';
		echo '[1] ' . $registro[1] . '<br>';
		echo '[2] ' . $registro[2] . '<br>';
		echo '[3] ' . $registro[3] . '<br>';
		echo '[4] ' . $registro[4] . '<br>';
		echo '[5] ' . $registro[5] . '<br>';
		echo '[6] ' . $registro[6] . '<br>';
		echo '[7] ' . $registro[7] . '<br>';
		echo '[8] ' . $registro[8] . '<br>';
		echo '[9] ' . $registro[9] . '<br>';
		*/

		$result = mt_rand(0, 9);

		return $registro[$result];
	}
?>