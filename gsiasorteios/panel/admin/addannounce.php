<?php require_once('../../Connections/conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO noticias (id, noticias_nome, noticias_assunto, noticias_username, noticias_data) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['anuncio_id'], "int"),
                       GetSQLValueString($_POST['noticias_nome'], "text"),
                       GetSQLValueString($_POST['noticias_assunto'], "text"),
                       GetSQLValueString($_POST['noticias_autor'], "text"),
                       GetSQLValueString($_POST['noticias_data'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());

  $insertGoTo = "announce.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'header.php'; ?>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Adicionando Not&iacute;cia RGC Brasil</h1>
      
<table width="997" cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th width="980" class="left"><div align="center">

        <p>Not&iacute;cia Site RGC Brasil</p>
        <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
         <label>ID:
         <input name="anuncio_id" type="text" id="anuncio_id" value="?" width="50px" readonly="readonly" />            
         <br />
            </label>
          <label>T&iacute;tulo:
            <input name="noticias_nome" style="width: 600px" type="text" id="noticias_nome" width="500px " />
            </label>       
          <label><br />
          Not&iacute;cia:
          <textarea name="noticias_assunto" id="noticias_assunto" style="width: 600px" width="500px "></textarea>
          <br />
          Data Atual:
          <input type="text" name="noticias_data" id="noticias_data" />
          <br />
          Autor:
          <input name="noticias_autor" type="text" id="noticias_autor" value="<?php echo $_SESSION['usuarioLogin']; ?>" readonly="readonly"/>
          <br />
          </label>
          <input type="submit" style="width: 80px" name="submit2" id="submit2" value="Adicionar" />
          <input type="submit" style="width: 80px" name="submit" id="submit" value="Limpar" />
          <input type="hidden" name="MM_insert" value="form1" />
        </form>
          <label>
          
            </label>
        <p>&nbsp;</p>
      </div></th>
      </tr>
  </thead>
  <tbody>
                  </tbody>
</table>
    </div>
  </div>
</div>
  <!-- End Content/-->
	</div>
<!-- Start Footer-->
</div>
<!-- End Footer-->
</body></html>