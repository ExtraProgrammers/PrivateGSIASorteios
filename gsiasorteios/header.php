<?php
  include ('classes/Config.php');
  include ('includes/functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
 <meta page contentType="text/html;" charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1" /> -->
<base />
<title>Home</title>
<link href="templates/yoo_venture/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="stylesheet" href="<?php echo DIR_CACHE; ?>template/widgetkit-31bf5890-5692a35e.css" type="text/css" />
<script src="<?php echo DIR_CACHE; ?>template/mootools-core-6e0732fd.js" type="text/javascript"></script>
<script src="<?php echo DIR_CACHE; ?>template/core-dd386b0a.js" type="text/javascript"></script>
<script src="<?php echo DIR_CACHE; ?>template/caption-03a31476.js" type="text/javascript"></script>
<script src="<?php echo DIR_CACHE; ?>template/jquery-b0e96037.js" type="text/javascript"></script>
<script src="<?php echo DIR_CACHE; ?>template/widgetkit-830c3bbf-7ab1d72f.js" type="text/javascript"></script>
  
  <!-- jQuery UI CSS-->
 <link type="text/css" href="<?php echo DIR_CACHE; ?>js/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript" src="<?php echo DIR_CACHE; ?>js/jquery/jquery.js"></script>
  
  <!-- jQuery UI CSS-->
  <link type="text/css" href="<?php echo DIR_CACHE; ?>js/jquery/ui/jquery-ui.min.css" rel="stylesheet" />

  <!-- Plugin jQuery UI Mask -->
  <script type="text/javascript" type="text/javascript" src="<?php echo DIR_CACHE; ?>js/jquery/jquery.mask.min.js"></script>

  <!-- Plugin jQuery Form -->
  <script type="text/javascript" type="text/javascript" src="<?php echo DIR_CACHE; ?>js/jquery/jquery.form.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script type="text/javascript" src="<?php echo DIR_CACHE; ?>js/bootstrap/js/bootstrap.js?v=2.3.2"></script>

  <!-- jQuery CountDown Script -->
  <script type="text/javascript" src="<?php echo DIR_CACHE; ?>js/jquery/jquery.countdown.js"> </script>

  <!-- FancyBox JS -->
  <script type="text/javascript" src="<?php echo DIR_CACHE; ?>js/fancybox/jquery.fancybox.js?v=2.1.5"></script>

  <!-- FancyBox CSS -->
  <link type="text/css" href="<?php echo DIR_CACHE; ?>js/fancybox/jquery.fancybox.css?v=2.1.5" rel="stylesheet" media="screen">

  <script type="text/javascript">
    var app = {
      base : 'http://localhost:8080/gsiasorteios/',
    };
  </script>
  <style type="text/css">
    br { clear: both; }
    .cntSeparator {
      font-size: 54px;
      margin: 10px 7px;
      color: #000;
    }
    .desc { margin: 7px 3px; }
    .desc div {
      float: left;
      font-family: Arial;
      width: 70px;
      margin-right: 65px;
      font-size: 13px;
      font-weight: bold;
      color: #000;
    }
  </style>
  <style type="text/css">
    .box-success {
      background: #dff0d8;
      border-color: #d6e9c6;
      border: 1px solid rgba(0,0,0,0.1);
      padding-left: 40px;
      border-radius: 5px;
      margin: 15px 0;
      padding: 10px;
    }
    .box-warning {
      background: #f2dede;
      border-color: #d6e9c6;
      border: 1px solid rgba(0,0,0,0.1);
      padding-left: 40px;
      border-radius: 5px;
      margin: 15px 0;
      padding: 10px;
    }

  </style>
<link rel="apple-touch-icon-precomposed" href="templates/yoo_venture/apple_touch_icon.png" />
<link rel="stylesheet" href="<?php echo DIR_CACHE; ?>template/template-2163a2d92.css" />
<script src="<?php echo DIR_CACHE; ?>template/template-7728f36e.js"></script>
</head>
<body class="page sidebar-a-right sidebars-1  isblog  top-a-sep  system-0" id="page" data-config="{&quot;twitter&quot;:1,&quot;plusone&quot;:1,&quot;facebook&quot;:0,&quot;color&quot;:&quot;blue&quot;}">
 <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=1621644084773495";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div align="center" class="width60 grid-h" id="div_info_process" style="left: 20%; position: fixed; z-index: 100; display: none;">
  </div>
  <div id="block-page">
    <div id="page-bg">
      <div id="block-toolbar">
        <div class="wrapper">
          <div id="toolbar" class="clearfix">
            <div class="float-left">
              <div class="module deepest">
            		<ul class="menu menu-line">

                  <li class="level1 item108">
                    <a href="<?php echo DIR_BASE; ?>" class="level1">
                      Página Inicial
                    </a>
                  </li>
                  <li class="level1 item109">
                    <a href="<?php echo DIR_DOCS; ?>sobre/" class="level1" target="_blank">
                      Como Funciona
                    </a>
                  </li>
                  <li class="level1 item110">
                    <a href="http://rankedgaming.com" class="level1" target="_blank">
                      Contato
                    </a>
                  </li>
                </ul>	
              </div>
            </div>					 
            <div id="search">
              <?php if (isset($S_NotConfirmed)) { ?>
                <div class="box-warning"> 
                  ATENÇÃO! Sua conta ainda não foi confirmada. Aguarde a confirmação para participar.
                </div>
              <?php } ?>
            </div>	 
          </div>
        </div>
      </div>
      <div id="block-main">
        <div class="wrapper clearfix">
          <header id="header" class="grid-block">
            <a id="logo" href="<?php echo DIR_BASE; ?>">
              <div class="custom-logo"><img src="<?php echo DIR_IMAGEN; ?>logo.png" width="310"></div>
            </a>
            <nav id="menu">
              <ul class="menu menu-dropdown">
                <li class="level1 item101 active current">
                  <a href="<?php echo DIR_BASE; ?>" class="level1">
                    <span>Página Inicial</span>
                  </a>
                </li>
                <!-- Código de SUB Menu Start-->
                <li class="level1 item102 parent">
                  <a href="#" class="level1 parent">
                    <span>Sorteios</span>
                  </a>
                  <div class="dropdown columns1">
                    <div class="dropdown-bg">
                      <div>
                        <div class="width100 column">
                          <ul class="level2">
                            <li class="level2 item103">
                              <a href="<?php echo DIR_DOCS; ?>sorteios/index.php?type=1" class="level2">
                                <span>Todos Sorteios</span>
                              </a>
                            </li>
                            <li class="level2 item103">
                              <a href="<?php echo DIR_DOCS; ?>sorteios/index.php?type=2"class="level2">
                                <span>Meus Sorteios</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- Código de SUB Menu End-->

                <li class="level1 item132 parent">
                  <a href="<?php echo DIR_DOCS; ?>sobre/" target="_blank" class="level1">
                    <span>Como Funciona</span>
                  </a>
                </li>

                <li class="level1 item105">
                  <a href="pages/stream/index.php" class="level1">
                    <span>Contato</span>
                  </a>
                </li>

                <li class="level1 item106 parent">
                  <span class="level1 parent">
                    <span>
                      <a <?php echo (empty($S_UserLogin)) ? 'href="' . DIR_DOCS . 'login/"' : 'href="#"'; ?>>
                        <span class="title">
                          <?php if (! empty($S_UserLogin)) { ?>
                            Olá, <i><?php echo substr($S_UserLogin, 0, 20); ?></i>!
                          <?php } else { ?>
                             Login
                          <?php } ?> 
                        </span>
                        <span class="subtitle"> 
                          <?php if (! empty($S_UserLogin)) { ?>
                            Edite seu perfil
                          <?php } else { ?>
                            Entre com sua conta
                          <?php } ?>
                        </span>
                      </a>
                    </span>
                  </span>
                  <div class="dropdown columns1" >
                    <div class="dropdown-bg">
                      <div>
                          <?php if (! empty($S_UserLogin)) { ?>
                            <div class="width100 column">
                              <ul class="level2">
                                <li class="level2 item107">
                                  <a href="<?php echo DIR_DOCS; ?>cadastro/" class="level2">
                                    <span>Alterar Dados</span>
                                  </a>
                                </li>
                                <li class="level2 item108">
                                  <a href="<?php echo DIR_DOCS; ?>logout/" class="level2">
                                    <span>Sair</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          <?php } else { ?>
                            <div class="module">
                              <form class="short style" action="<?php echo DIR_DOCS; ?>login/index.php" method="post">
                                <div class="username">
                                  <input type="text" name="act_account_email" size="20" placeholder="E-mail" />
                                </div>

                                <div class="password">
                                  <input type="password" name="act_account_senha" size="20" placeholder="Senha" />
                                </div>
                            
                                <div class="button">
                                  <button value="Log in" name="Submit" type="submit">Entrar</button>
                                  <button value="Registrar" type="button" onClick="location.href='<?php echo DIR_DOCS; ?>cadastro/'">Registrar-se</button>
                                </div>
                              </form>
                            </div>
                          <?php } ?>
                      </div>
                    </div>
                  </div>
                </li>
                <br />
              </ul>
            </nav>
          </header>
