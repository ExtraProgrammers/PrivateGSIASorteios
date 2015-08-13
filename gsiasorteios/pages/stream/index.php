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

mysql_select_db($database_stream, $stream);
$query_stream = "SELECT * FROM stream ORDER BY stream_id ASC";
$stream = mysql_query($query_stream, $stream) or die(mysql_error());
$row_stream = mysql_fetch_assoc($stream);
$totalRows_stream = mysql_num_rows($stream);
?>
<?php include 'header.php'; ?>
<?php include '../../menu.php'; ?>

<div class="grid-box width100 grid-v">
<div class="module mod-header mod-header-color  deepest">

<h3 class="module-title">Streammings em Transmissão</h3>	

<?php do { ?>
  <ul class="menu menu-sidebar">
    <li class="level1 item117 parent">
      <span class="separator level1 parent">
        <span><?php echo $row_stream['tag_clan1']; ?> <font color="royalblue">vs</font> <?php echo $row_stream['tag_clan2']; ?></span></span>
      <ul class="level2 width100">
        <code> Streammer: <strong><?php echo $row_stream['streammer']; ?></strong></code>
        <div class="float-right"> <strong><a href="watch.php?streammer=<?php echo $row_stream['streammer']; ?>">Assistir </a></div></strong>
        <br>
        <div class="grid-box width50 grid-h">
          <div class="module mod-dotted  deepest" style="min-height: 250px;">
            <h3> 
              <center>
                Team <font color="red">Sentinel</font>
                </center>
    </h3>
    <table class="zebra">
      <tbody>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero1']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['sentinel1']; ?></font></td>
		    </tr>
        <tr>
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero2']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['sentinel2']; ?></font></td>
		    </tr>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero3']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['sentinel3']; ?></font></td>
		    </tr>
        <tr>
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero4']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['sentinel4']; ?></font></td>
		    </tr>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero5']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['sentinel5']; ?></font></td>
		    </tr>
        </tbody>
      </table>
    </div> </div>
    
<div class="grid-box width50 grid-h">
        <div class="module mod-dotted  deepest" style="min-height: 250px;">
          <h3> 
            <center>
              Team <font color="green">Scourge</font>
              </center>
    </h3>
    <table class="zebra">
      <tbody>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero6']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['scourge1']; ?></font></td>
		    </tr>
        <tr>
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero7']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['scourge2']; ?></font></td>
		    </tr>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero8']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['scourge3']; ?></font></td>
		    </tr>
        <tr>
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero9']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['scourge4']; ?></font></td>
		    </tr>
        <tr class="odd">
          <td class="bold"><img src="http://rankedgamingbrasil.com.br/icons/<?php echo $row_stream['hero10']; ?>.jpg"> </img></td>
			    <td><font size="4"><?php echo $row_stream['scourge5']; ?></font></td>
		    </tr>
        </tbody>
      </table>
</div> 
    </ul>
    </li>
        </ul>
  <?php } while ($row_stream = mysql_fetch_assoc($stream)); ?></div>
</div>
</div>

</div>
</div>
</div>
</body>

<?php include 'footer.php'; ?>
<?php
mysql_free_result($stream);
?>