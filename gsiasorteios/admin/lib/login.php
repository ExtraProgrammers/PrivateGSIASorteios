<?php
if(isset($_REQUEST['logar'])){
$usuario = $_REQUEST['usuario'];
$senha   = $_REQUEST['senha'];
 
$sql = "SELECT * FROM login WHERE usuario ='$usuario' AND senha = '$senha' ";
$query = mysql_query($sql) or die(mysql_error());
$qtda  = mysql_num_rows($query);
if($qtda == 0){
	echo 'Erro ao logar';	
	}else{		
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha']   = $senha;		
		header("Location: admin/index.php");		
		}
}
?>