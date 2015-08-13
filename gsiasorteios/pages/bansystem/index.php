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

$colname_bans = "-1";
if (isset($_GET['channel'])) {
  $colname_bans = $_GET['channel'];
}
mysql_select_db($database_conn, $conn);
$query_bans = sprintf("SELECT * FROM countbans WHERE channel = %s ORDER BY username ASC", GetSQLValueString($colname_bans, "text"));
$bans = mysql_query($query_bans, $conn) or die(mysql_error());
$row_bans = mysql_fetch_assoc($bans);
$totalRows_bans = mysql_num_rows($bans);
?>

<div class="grid-box width100 grid-v">
<div class="module mod-header mod-header-color  deepest">

<h3 class="module-title">Streammings em Transmissão</h3>	


  <ul class="menu menu-sidebar">
    <li class="level1 item117 parent">
      <span class="separator level1 parent">
        <span> <font color="royalblue">vs</font> </span></span>
      <ul class="level2 width100">
        <code> Streammer: <strong></strong></code>
        <div class="float-right"> <strong></div>
        <form id="form1" name="form1" method="post" action="search.php">
          <label>Username
          <input type="text" name="username" id="username" />
          </label>
          <label><input type="submit" name="submit" id="submit" value="Enviar" />
          </label>
<p>
            <label>Channel
            <input name="channel" type="text" readonly="readonly" id="channel" value="<?php echo $row_bans['channel']; ?>" />
            </label>
          </p>
        </form>
        </strong><br>
        <div class="grid-box width50 grid-h">
          <div class="module mod-dotted  deepest" style="min-height: 250px;">
            <h3> 
              <center>
                Team <font color="red">Sentinel</font>
                </center>
    </h3>
    <table align="center" class="zebra">
      <tbody>
        <tr class="odd">
          <td class="bold"><div align="center">
            <?php do { ?>
              <?php echo $row_bans['username']; ?>
              <?php } while ($row_bans = mysql_fetch_assoc($bans)); ?></div></td>
			    </tr>
        </tbody>
      </table>
    </div> </div>
    
<div class="grid-box width50 grid-h">
        <div class="module mod-dotted  deepest" style="min-height: 250px;">
          <h3> 
            <center>
              <p>Team <font color="green">Scourge</font>              </p>
              <table class="zebra">
                <tbody>
                  <tr class="odd">
                    <td class="bold"><?php echo $row_bans['channel']; ?></td>
                  </tr>
                </tbody>
              </table>
              <p>&nbsp;</p>
            </center>
    </h3>
    <table class="zebra">
      <tbody>
        <tr class="odd">
          <td class="bold"></td>
			    </tr>
        </tbody>
      </table>
</div> 
    </ul>
    </li>
        </ul>
  </div>
</div>
</div>

</div>
</div>
</div>
</body>

<?php
mysql_free_result($bans);
?>