<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login RGCB Admin Panel</title>
<script language="javascript" type="text/javascript">
var SITEURL = "<?php echo SITEURL; ?>";
</script>
<link href="assets/front.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript" src="assets/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="assets/global.js"></script>
<script type="text/javascript" src="assets/tooltip.js"></script>
<link href="assets/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function() {
	  $('input[type="checkbox"]').ezMark();
	  $('input[type="radio"]').ezMark();
	  $('#imgfile').fileinput();
	  
    $("#news").hide();
    $("#shownews").click(function () {
      $("#news").toggle('slide',500);
    });

});
</script>
</head>

<body>
<div class="wrap">
<div id="msgholder"></div>
  <div id="content">
<span id="loader" style="display:none"></span> 