<?php include("../seguranca.php"); 
protegePagina();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['pageTitle']; ?></title><body>
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
<!-- Start Header-->
<div id ="header">
  <div class="wrap">
    <div class="logo"></div>
    <div class="toolbox">Welcome: <?php echo $_SESSION['usuarioLogin']; ?> <a href="../index.php"><img src="../images/account.png" alt="" class="tooltip" title="Home"/></a> <a href="logout.php"><img src="../images/logoff.png" alt="" class="tooltip" title="Log Out"/></a></div>
    <div class="clear"></div>
    <div id="menu">
      <ul id="nav">
        <li><a href="javascript:void(0);" title="Anuncio Global" class="users">Anúncio Global</a>
          <ul>
            <li><a href="annglobal.php" title="Anuncio Global">Editar Anúncio Atual</a></li>            
          </ul>
        </li>
        <li><a href="javascript:void(0);" title="Anuncio" class="users">Anúncio</a>
          <ul>
            <li><a href="../../panel/admin/announce.php" title="Anuncio">Alterar anúncios</a></li>            
          </ul>
        </li>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>



