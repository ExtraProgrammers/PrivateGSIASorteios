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
  $updateSQL = sprintf("UPDATE anuncio_global SET anuncio_assunto=%s WHERE id=%s",
                       GetSQLValueString("<div class='box-download'>".$_POST['Anuncio_Global'].'</div>', "text"),
                       GetSQLValueString($_POST['anuncio_id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_anuncio_global = "SELECT * FROM anuncio_global";
$anuncio_global = mysql_query($query_anuncio_global, $conn) or die(mysql_error());
$row_anuncio_global = mysql_fetch_assoc($anuncio_global);
$totalRows_anuncio_global = mysql_num_rows($anuncio_global);
?>
<?php include 'header.php'; ?>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Editando anúncio global</h1>
      
<table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th class="left"><div align="center">

        <p>Anúncio Global Site RGC Brasil</p>
        <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
         <label>ID:
            <input name="anuncio_id" type="text" id="anuncio_id" value="1" width="50px" readonly="readonly" />
            <br />
            </label>
          <label>Anúncio:
            <input name="Anuncio_Global" type="text" id="Anuncio_Global" value="<?php echo $row_anuncio_global['anuncio_assunto']; ?>" style="width: 800px" />
            </label>
        
          <label><br />
          <br />
          <input type="submit" style="width: 80px" name="submit" id="submit" value="Atualizar" />
          </label>
          <input type="hidden" name="MM_update" value="form1" />
                  <label></label>
                  <label>
                  <input type="reset" name="reset" style="width: 80px" id="reset" value="Limpar" />
                  </label>
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
mysql_free_result($anuncio_global);
?>

