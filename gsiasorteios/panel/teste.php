<?php require_once('Connections/conn.php'); ?>
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

$colname_usuarios = "-1";
if (isset($_GET['channel_name'])) {
  $colname_usuarios = $_GET['channel_name'];
}
mysql_select_db($database_conn, $conn);
$query_usuarios = sprintf("SELECT channel_name, log_name, url FROM `data` WHERE channel_name = %s", GetSQLValueString($colname_usuarios, "text"));
$usuarios = mysql_query($query_usuarios, $conn) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);
?><?php include("seguranca.php"); 
protegePagina();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Legion Booter</title>
<script language="javascript" type="text/javascript">
var IMGURL = "http://legionbooter.info/admin/images";
var ADMINURL = "http://legionbooter.info/admin";
</script>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript" src="assets/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="assets/tooltip.js"></script>
<script type="text/javascript" src="assets/global.js"></script>
<link href="../assets/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/editor/jquery.cleditor.js"></script>
<script type="text/javascript" src="assets/editor/jquery.cleditor.xhtml.js"></script>
<link rel="stylesheet" type="text/css" href="assets/editor/jquery.cleditor.css" />
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
</head>
<body>
<!-- Start Header-->
<div id ="header">
  <div class="wrap">
    <div class="logo"><a href="index.php">RGCB Admin LOGS</a></div>
    <div class="toolbox">Welcome: RaZeN | <a href="../index.php"><img src="../images/account.png" alt="" class="tooltip" title="Home"/></a> <a href="logout.php"><img src="../images/logoff.png" alt="" class="tooltip" title="Log Out"/></a></div>
    <div class="clear"></div>
    <div id="menu">
      <ul id="nav">
        <li><a href="javascript:void(0);" title="User Management" class="users">Channel LOGS</a>
          <ul>
            <li><a href="index.php?do=users" title="Users">Brasil</a></li>
            <li><a href="index.php?do=logs" title="Logs">(SA) RPG MIX</a></li>
            <li><a href="index.php?do=logs" title="Logs">ZonaDota</a></li>
            <li><a href="index.php?do=logs" title="Logs">Razer Public</a></li>
            <li><a href="index.php?do=logs" title="Logs">Nydus Public</a></li>
            <li><a href="index.php?do=logs" title="Logs">Bolivia CW</a></li>
          </ul>
        </li>
        <li><a href="index.php?do=news" title="News Manager" class="news">News Manager</a></li>
        <li><a href="javascript:void(0);" title="Memberships" class="mems">Memberships</a>
          <ul>
            <li><a href="index.php?do=memberships" title="Manage Memberships">Manage Memberships</a></li>
            <li><a href="index.php?do=gateways" title="Payment Gateways">Payment Gateways</a></li>
            <li><a href="index.php?do=transactions" title="Transaction Records">Transaction Records</a></li>
          </ul>
        </li>
        <li><a href="index.php?do=newsletter" title="Newsletter" class="newsletter">Newsletter</a></li>
        <li><a href="javascript:void(0);" title="Configuration" class="config">Configuration</a>
          <ul>
            <li><a href="index.php?do=config" title="Site Configuration">Site Configuration</a></li>
            <li><a href="index.php?do=addshell" title="Add Shells">Add Shells</a></li>
            <li><a href="index.php?do=shells" title="View Shells">View Shells</a></li>
            <li><a href="index.php?do=templates" title="Email Templates">Email Templates</a></li>
            <li><a href="index.php?do=maintenance" title="Site Maintenance">Site Maintenance</a></li>
            <li><a href="index.php?do=backup" title="Database Backup/Restore">Database Backup/Restore</a></li>
            <li><a href="index.php?do=builder" title="Page Builder">Page Builder</a></li>
          </ul>
        </li>
        <li><a href="javascript:void(0);" title="Help Management" class="help">Help Section</a>
          <ul>
            <li><a href="index.php?do=help-login" title="Login Based Protection">Login Based Protection</a></li>
            <li><a href="index.php?do=help-redirect" title="Login Redirect">Login Redirect</a></li>
            <li><a href="index.php?do=help-member" title="Membership Based Protection">Membership Protection</a></li>
            <li><a href="index.php?do=help-cron" title="Cron Jobs">Cron Jobs</a></li>
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
         <h1><img src="../images/user-lrg.png" alt="" />Manage Users</h1>
<p class="info">&nbsp;</p>
<h2><span><a href="index.php?do=users&amp;action=add" class="button-alt-sml">Add User</a></span>Viewing Users</h2>
<table cellpadding="0" cellspacing="0" class="display">
  <thead>
    <tr>
      <th width="30" class="left">#</th>
      <th width="192" class="left">Username</th>
      <th width="235">User Status</th>
      <th width="174">Membership</th>
      <th width="163">Last Login</th>
      <th width="146">Actions</th>
    </tr>
  </thead>
  <tbody>
            <tr>
      <th>12.</th>
      <td><a href="index.php?do=newsletter&amp;emailid=aksdpaskdopsakd%40hotmail.com">RaZeN</a></td>
      <td align="center"><img src="http://legionbooter.info/images/u_active.png" alt="" class="tooltip" title="User Active"/></td>
      <td align="center">        --/--        </td>
      <td align="center">29. Jan. 2014.</td>
      <td align="center"><a href="index.php?do=users&amp;action=edit&amp;userid=12"><img src="../images/edit.png" class="tooltip img-wrap2"  alt="" title="Edit"/></a>
                <a href="javascript:void(0);" class="delete" rel="RaZeN" id="item_12"><img src="../images/delete.png" class="tooltip img-wrap2"  alt="" title="Delete"/></a>        </td>
    </tr>
                  </tbody>
</table>
<div id="dialog-confirm" style="display:none;" title="Delete User">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete this user?<br />
    <strong>This action cannot be undone!!!</strong></p>
</div>
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function () {
    $("#search-input").watermark("Search Username");
    $("#search-input").keyup(function () {
        var srch_string = $(this).val();
        var data_string = 'userSearch=' + srch_string;
        if (srch_string.length > 3) {
            $.ajax({
                type: "POST",
                url: "controller.php",
                data: data_string,
                beforeSend: function () {
                    $('#search-input').addClass('loading');
                },
                success: function (res) {
                    $('#suggestions').html(res).show();
                    $("input").blur(function () {
                        $('#suggestions').customFadeOut();
                    });
                    if ($('#search-input').hasClass("loading")) {
                        $("#search-input").removeClass("loading");
                    }
                }
            });
        }
        return false;
    });
    $('a.delete').live('click', function () {
        var id = $(this).attr('id').replace('item_', '')
        var parent = $(this).parent().parent();
        var title = $(this).attr('rel');
        $("#dialog-confirm").data({
            'delid': id,
            'parent': parent,
            'title': title
        }).dialog('open');
        return false;
    });
    $("#dialog-confirm").dialog({
        resizable: false,
        bgiframe: true,
        autoOpen: false,
        width: 400,
        height: "auto",
        zindex: 9998,
        modal: false,
        buttons: {
            'Delete': function () {
                var parent = $(this).data('parent');
                var id = $(this).data('delid');
                var title = $(this).data('title');
                $.ajax({
                    type: 'post',
                    url: "controller.php",
                    data: 'deleteUser=' + id + '&username=' + title,
                    beforeSend: function () {
                        parent.animate({
                            'backgroundColor': '#FFBFBF'
                        }, 400);
                    },
                    success: function (msg) {
                        parent.fadeOut(400, function () {
                            parent.remove();
                        });
                        $("html, body").animate({
                            scrollTop: 0
                        }, 600);
                        $("#msgholder").html(msg);
                    }
                });
                $(this).dialog('close');
            },
            'Cancel': function () {
                $(this).dialog('close');
            }
        }
    });
});
$(function () {
    var dates = $('#fromdate, #enddate').datepicker({
        defaultDate: "+1w",
        changeMonth: false,
        numberOfMonths: 2,
        dateFormat: 'yy-mm-dd',
        onSelect: function (selectedDate) {
            var option = this.id == "fromdate" ? "minDate" : "maxDate";
            var instance = $(this).data("datepicker");
            var date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
            dates.not(this).datepicker("option", option, date);
        }
    });
});
// ]]>
</script>
    </div>
  </div>
</div>
  <!-- End Content/-->
	</div>
<!-- Start Footer-->
<div id="footer">
  Copyright &copy;2014 Legion Booter<br />
    CustomSource.co.uk &bull; The Custom Source v2.0</div>
</div>
<!-- End Footer-->
</body></html>


<?php
mysql_free_result($usuarios);
?>