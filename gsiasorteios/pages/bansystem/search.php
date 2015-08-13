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

$colname_count = "-1";
if (isset($_GET['username'])) {
  $colname_count = $_GET['username'];
}
mysql_select_db($database_conn, $conn);
$query_count = sprintf("SELECT * FROM countbans WHERE username = %s AND channel = %s", GetSQLValueString($_REQUEST['username'], "text"), GetSQLValueString($_REQUEST['channel'], "text"));
$count = mysql_query($query_count, $conn) or die(mysql_error());
$row_count = mysql_fetch_assoc($count);
$totalRows_count = mysql_num_rows($count);
?>
<div class="grid-box width800 grid-h">
<div class="module mod-box  deepest" style="min-height: 800px;">

<div class="grid-box width50 grid-h">
<div class="module mod-dotted  deepest" style="min-height: 250px;">
<h3 class="module-title"> 
<center>
Team <font color="red">Sentinel</font>
</center>
</h3>
<table class="zebra">
	<tbody>
		<tr class="odd">
			<td class="bold"></img><?php echo $row_count['username']; ?></td>
			<td>&nbsp;<?php echo $totalRows_count ?> </td>
		</tr>
	</tbody>
</table>
</div>
</div>
<br>
</div>
</div>

</div>
</div>
</div>
</body>


<?php
mysql_free_result($count);
?>
