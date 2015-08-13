<?php require_once('../Connections/conn.php'); ?>
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

$colname_logs = "-1";
if (isset($_GET['log_name'])) {
  $colname_logs = $_GET['log_name'];
}
mysql_select_db($database_conn, $conn);
$query_logs = sprintf("SELECT log_name, log FROM `data` WHERE log_name = %s", GetSQLValueString($colname_logs, "text"));
$logs = mysql_query($query_logs, $conn) or die(mysql_error());
$row_logs = mysql_fetch_assoc($logs);
$totalRows_logs = mysql_num_rows($logs);
?><?php include("../seguranca.php"); 
protegePagina();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../assets/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../assets/jquery.js"></script>
<script type="text/javascript" src="../assets/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="../assets/tooltip.js"></script>
<script type="text/javascript" src="../assets/global.js"></script>
<link href="../assets/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../assets/editor/jquery.cleditor.js"></script>
<script type="text/javascript" src="../assets/editor/jquery.cleditor.xhtml.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/editor/jquery.cleditor.css" />
<script type="text/javascript">
$(document).ready(function() {
	  $('input[type="checkbox"]').ezMark();
	  $('input[type="radio"]').ezMark();
	  $('#imgfile').fileinput();
	  
	  $("#dialog").dialog({
		  bgiframe: true,
		  autoOpen: false,
		  width: "auto",
		  height: "auto",
		  zindex: 9998,
		  modal: false
	  });
});
/* Main Menu */
$(function(){
    $("ul#nav li").hover(function(){
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    }, function(){
        $(this).removeClass("hover");
        $('ul:first',this).css('visibility', 'hidden');
    });
    $("ul#nav li:has(ul)").find("a:first").append("&nbsp;...");
});
</script>
<title><?php echo $_SESSION['pageTitle']; ?></title><body>
<!-- Start Header-->
<div id ="header">
  <div class="wrap">
    <div class="logo"><a href="index.php">RGCB Admin LOGS</a></div>
    <div class="toolbox">Welcome: <?php echo $_SESSION['usuarioLogin']; ?> <a href="index.php"><img src="../images/account.png" alt="" class="tooltip" title="Home"/></a> <a href="logout.php"><img src="../images/logoff.png" alt="" class="tooltip" title="Log Out"/></a></div>
    <div class="clear"></div>
    <div id="menu">
      <ul id="nav">
        <li><a href="javascript:void(0);" title="User Management" class="users">Channel LOGS</a>
          <ul>
           <li><a href="index.php?channel_name=Brasil" title="Users">Brasil</a></li>
            <li><a href="index.php?channel_name=SARPGMIX" title="Logs">(SA) RPG MIX</a></li>
            <li><a href="index.php?channel_name=ZonaDota" title="Logs">ZonaDota</a></li>
            <li><a href="index.php?channel_name=RazerPublic" title="Logs">Razer Public</a></li>
            <li><a href="index.php?channel_name=NydusPublic" title="Logs">Nydus Public</a></li>
            <li><a href="index.php?channel_name=BoliviaCW" title="Logs">Bolivia CW</a></li>
            <li><a href="index.php?channel_name=AsiaEsport" title="Logs">Asia.Esport</a></li>
            <li><a href="index.php?channel_name=EUPublic" title="Logs">(EU) Public</a></li>
            <li><a href="index.php?channel_name=Lebanon" title="Logs">Lebanon</a></li>
          </ul>
        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!-- End Header-->  <!-- Start Content-->
<div class="wrap">
  <div id="content-wrap">
    <div id="content">
    <span id="loader" style="display:none"></span>
     <div id="msgholder"></div>
         <h1><img src="../images/user-lrg.png" alt="" />Viewing Logs from file  [<?php echo $row_logs['log_name']; ?>]</h1>
      
<table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th class="left"><div align="center">Chat LOG [<?php echo $row_logs['log_name']; ?>]</div></th>
      </tr>
  </thead>
  <tbody>
            <tr>
             
              <th><table width="100%" border="0">
                <tr>
                  <td><div align="left"><?php echo $row_logs['log']; ?></div></td>
                </tr>
              </table></th>
            </tr>
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
mysql_free_result($logs);
?>