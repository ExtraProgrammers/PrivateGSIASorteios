<?php 
 // HTTP
  define('HTTP_SERVER', 'http://localhost:8080/');

  // 
  define('HTTPS_SERVER', 'http://localhost:8080/');

  // DIR
  define('DIR_BASE', HTTP_SERVER . 'gsiasorteios/');
  define('DIR_IMAGEN', DIR_BASE . 'images/');
  define('DIR_CACHE', DIR_BASE . 'cache/');
  define('DIR_DOCS', DIR_BASE . 'docs/');

  include ('Session.php');
  include ('User.php');
  include ('Querys.php'); 
  include ('Sorteios.php');
  include ('Participantes.php');
  include ('Ganhadores.php');
  include ('Checkout.php');
  include ('Vendas.php');
  include ('Cadastros.php');
  include ('ProdutosInfo.php');

  $querys = new Querys; // Inicia Classe Querys

  $session = new Session; // Inicia Classe Session
  $session->StartSession(); // Inicia SESSION

  $user = new User; // Inicia Classe User

  $sorteios = new Sorteios;

  $participantes = new Participantes;

  $ganhadores = new Ganhadores;
  
  $produtos_info = new ProdutosInfo;
  
  $vendas = new Vendas;
  
  if ( (! isset($session->data['user']['user_login'])) and (! isset($session->data['user']['user_cpf'])) ) {
    $session->Destroy('user');
  } else {
    $user->CheckLogin($session->data);

    if ($user->isLoggedUser()) {
      if ($user->isConfirmed() == '0') {
        $S_NotConfirmed = true;
      }

      $S_UserLogin = $user->isLoggedUser();  
    }
  }
?>