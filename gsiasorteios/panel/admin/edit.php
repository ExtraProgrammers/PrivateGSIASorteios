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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE noticias SET noticias_nome=%s, noticias_assunto=%s, noticias_data=%s WHERE id=%s",
                       GetSQLValueString($_POST['noticias_nome'], "text"),
                       GetSQLValueString($_POST['noticias_assunto'], "text"),
                       GetSQLValueString($_POST['noticias_data'], "text"),
                       GetSQLValueString($_POST['anuncio_id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_show_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_show_noticias = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_show_noticias = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_show_noticias, "int"));
$show_noticias = mysql_query($query_show_noticias, $conn) or die(mysql_error());
$row_show_noticias = mysql_fetch_assoc($show_noticias);
$totalRows_show_noticias = mysql_num_rows($show_noticias);
?>
<?php include 'header.php'; ?>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Editando not&iacute;cia RGC Brasil</h1>
      
<table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th class="left"><div align="center">

        <p>Editar Not&iacute;cia Site RGC Brasil</p>
        <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
         <label>ID:
         <input name="anuncio_id" type="text" id="anuncio_id" value="<?php echo $row_show_noticias['id']; ?>" readonly="readonly" width="50px" />            
         <br />
            </label>
          <label>T&iacute;tulo:
            <input name="noticias_nome" type="text" id="noticias_nome" style="width: 600px" value="<?php echo $row_show_noticias['noticias_nome']; ?>" width="500px " />
            </label>       
          <label><br>
          Not&iacute;cia:
          <textarea name="noticias_assunto" id="noticias_assunto" style="width: 600px" width="500px "><?php echo $row_show_noticias['noticias_assunto']; ?></textarea>
          <br>
          Data Atual:
          <input name="noticias_data" type="text" id="noticias_data" value="<?php echo $row_show_noticias['noticias_data']; ?>" />
          <br>
          <br />
          <input type="submit" style="width: 80px" name="submit" id="submit" value="Atualizar" />
          </label>
<label></label>
                  <label>
                  <input type="reset" name="reset" style="width: 80px" id="reset" value="Limpar" />
                  </label>
                  <input type="hidden" name="MM_update" value="form1">
        </form>

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
</body></html><?php
mysql_free_result($show_noticias);
?>