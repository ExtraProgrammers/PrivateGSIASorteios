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

mysql_select_db($database_conn, $conn);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$noticias = mysql_query($query_noticias, $conn) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);
?>
<?php include 'header.php'; ?>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Not&iacute;cias do site RGC Brasil</h1>
      
 <div align="center">
          <table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th width="30" class="left">#</th>
      <th width="235" class="center">Título</th>
      <th width="235" class="center">Autor</th>
      <th width="235" class="center">Data de Publicação</th>
      <th width="100" class="center">Editar</th>
      <th width="100" class="center">Apagar</th>
      </tr>
  </thead>
  <tbody>
  <?php do { ?>
<tr>
             
              <th><?php echo $row_noticias['id']; ?>.</th>
              <td align="center"><?php echo $row_noticias['noticias_nome']; ?></td>
              <td align="center"><?php echo $row_noticias['noticias_username']; ?></td>
              <td align="center"><?php echo $row_noticias['noticias_data']; ?></td>    
              <td align="center"><a href="edit.php?id=<?php echo $row_noticias['id']; ?>">Editar</a></td>  
              <td align="center"><a href="apagar.php?id=<?php echo $row_noticias['id']; ?>">Apagar</a></td>          
</tr>
 <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
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
mysql_free_result($noticias);
?>