<?php require_once('../../Connections/stream.php'); ?>
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

$colname_view = "-1";
if (isset($_GET['streammer'])) {
  $colname_view = $_GET['streammer'];
}
mysql_select_db($database_stream, $stream);
$query_view = sprintf("SELECT * FROM stream WHERE streammer = %s", GetSQLValueString($colname_view, "text"));
$view = mysql_query($query_view, $stream) or die(mysql_error());
$row_view = mysql_fetch_assoc($view);
$totalRows_view = mysql_num_rows($view);
?>
<?php include 'header.php'; ?>
<?php include '../../menu.php'; ?>

<div class="grid-box width800 grid-h">
<div class="module mod-black  deepest" style="min-height: 378px;">
<object type="application/x-shockwave-flash" height="378" width="950" id="live_embed_player_flash" data="http://pt-br.twitch.tv/widgets/live_embed_player.swf?channel=pphantoon_dotatv" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://pt-br.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=pt-br.twitch.tv&channel=pphantoon_dotatv&auto_play=true&start_volume=25" /></object>
</div>
</div>

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
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero1']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['sentinel1']; ?></font></td>
		</tr>
		<tr>
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero2']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['sentinel2']; ?></font></td>
		</tr>
			<tr class="odd">
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero3']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['sentinel3']; ?></font></td>
		</tr>
		<tr>
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero4']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['sentinel4']; ?></font></td>
		</tr>
			<tr class="odd">
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero5']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['sentinel5']; ?></font></td>
		</tr>
	</tbody>
</table>
</div>
</div>
<div class="grid-box width50 grid-h">
<div class="module mod-dotted  deepest" style="min-height: 250px;">
<h3 class="module-title"> 
<center>
Team <font color="green">Scourge</font>
</center>
</h3>
<table class="zebra">
	<tbody>
		<tr class="odd">
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero6']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['scourge1']; ?></font></td>
		</tr>
		<tr>
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero7']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['scourge2']; ?></font></td>
		</tr>
			<tr class="odd">
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero8']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['scourge3']; ?></font></td>
		</tr>
		<tr>
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero9']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['scourge4']; ?></font></td>
		</tr>
			<tr class="odd">
			<td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_view['hero10']; ?>.jpg"> </img></td>
			<td><font size="4"><?php echo $row_view['scourge5']; ?></font></td>
		</tr>
	</tbody>
</table>
</div>
</div>
<br>

<div align="center">
<h3><font size="6" color="royalblue">Chat</font></h3>
<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=pphantoon_dotatv&popout_chat=true" height="400" width="950"></iframe>
</div>
</div>
</div>

</div>
</div>
</div>
</body>

<?php include 'footer.php'; ?>
<?php
mysql_free_result($view);
?>
