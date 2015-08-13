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
$colname_apagar_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_apagar_noticias = $_GET['id'];
}
mysql_select_db($database_conn, $conn);
$query_apagar_noticias = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_apagar_noticias, "int"));
$apagar_noticias = mysql_query($query_apagar_noticias, $conn) or die(mysql_error());
$row_apagar_noticias = mysql_fetch_assoc($apagar_noticias);
$totalRows_apagar_noticias = mysql_num_rows($apagar_noticias);

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM noticias WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());
}

$colname_apagar_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_apagar_noticias = $_GET['id'];
}

?>
<?php include 'header.php'; ?>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Apagando not&iacute;cia RGC Brasil</h1>
      
<table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th class="left"><div align="center">

        <p>Apagar Not&iacute;cia Site RGC Brasil</p>
        <form id="form1" name="form1" method="POST" action="announce.php">
         <label>ID:
         <input name="anuncio_id" type="text" id="anuncio_id" value="<?php echo $row_apagar_noticias['id']; ?>" readonly="readonly" />            
         <br />
            </label>
          <label>T&iacute;tulo:
            <input name="noticias_nome" type="text" id="noticias_nome" style="width: 600px" value="<?php echo $row_apagar_noticias['noticias_nome']; ?>" readonly="readonly" />
            </label>       
          <label><br>
          Not&iacute;cia:
          <textarea name="noticias_assunto" readonly="readonly" id="noticias_assunto" style="width: 600px" ><?php echo $row_apagar_noticias['noticias_assunto']; ?></textarea>
          <br>
          Data Atual:
          <input name="noticias_data" type="text" id="noticias_data" value="<?php echo $row_apagar_noticias['noticias_data']; ?>" readonly="readonly" />
          <br>
          <br />
          <input type="submit" style="width: 120px" name="submit" id="submit" value="Apagar" />
          </label>
<label></label>
                  <label></label>
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
</body></html>
<?php
mysql_free_result($apagar_noticias);
?>
