<?php
/**
 * Class User
 *
 * @author	  	Lucas Junio <lucas.170696@gmail.com>
 * @copyright	Copyright (c) 2015, Lucas Junio.
 * @since		Version 2.0
 * @filesource
 */
class User 
{
	public $act_accounts_id;
	public $act_account_email;
	public $act_account_senha;
	public $act_account_cpf;
	public $act_account_nome;

	/**
	 * Construtor 
	 *
	 * @access public
	 * @param objeto $registry
	 * @return void
	 */
  	public function CheckLogin($registry) 
  	{
		$db = new Querys;
		$session = $registry;
		
		// Verifica se usuario está logado, caso contrario verifica aluno.
    	if (isset($session['user']['act_accounts_id'])) {
			$usuario_query = $db->query("SELECT 
												* 
											FROM 
												gsia_accounts
											WHERE 
												act_accounts_id = '" . (int)$session['user']['act_accounts_id'] . "' AND
												act_account_email = '" . $db->escape($session['user']['user_login']) . "' AND 
												act_account_senha = '" . $db->escape($session['user']['act_account_senha']) . "'");

			if ($usuario_query->num_rows) {
				$this->act_accounts_id = $usuario_query->row['act_accounts_id'];
				$this->act_account_email = $usuario_query->row['act_account_email'];
				$this->act_account_cpf = $usuario_query->row['act_account_cpf'];
				$this->act_account_nome = $usuario_query->row['act_account_nome'];
				$this->act_account_status = $usuario_query->row['act_account_ativo'];

				return true;
			} else {
				$this->logoutUser();
				
				return false;
			}
    	}
  	}

	/**
	 * Metodo loginUser
	 *
	 * @access public
	 * @param string $login
	 * @param string $senha
	 * @return booleam
	 */
  	public function loginUser($login, $senha) 
  	{
    	$db = new Querys;

		// Verifica se usuario está logado, caso contrario verifica aluno.
		$usuario_query = $db->query("SELECT 
											* 
										FROM 
											gsia_accounts
										WHERE 
											act_account_email = '" . $db->escape($login) . "' AND 
											act_account_senha = '" . $db->escape(md5($senha)) . "'");
		
		if ($usuario_query->num_rows) {
			$this->act_accounts_id = $usuario_query->row['act_accounts_id'];
			$this->act_account_email = $usuario_query->row['act_account_email'];
			$this->act_account_cpf = $usuario_query->row['act_account_cpf'];
			$this->act_account_nome = $usuario_query->row['act_account_nome'];
			$this->act_account_senha = $usuario_query->row['act_account_senha'];

			$session = new Session;
			$session->StartSession();
			$session->data['user']['act_accounts_id'] = $this->act_accounts_id;
			$session->data['user']['user_login'] = $this->act_account_email;
			$session->data['user']['user_cpf'] = $this->act_account_cpf;
			$session->data['user']['user_name'] = $this->act_account_nome;
			$session->data['user']['act_account_senha'] = $this->act_account_senha;

			return true;
		} else {
			return false;
		}
  	}

	/**
	 * Metodo loginAluno
	 *
	 * @access public
	 * @param string $cpf
	 * @return booleam
	 */
  	public function loginAluno($cpf) 
  	{
  		// Limpa cpf
  		$cpf =  preg_replace('/[^0-9]/', '', $cpf);

  		$aluno_query = $this->db->query("SELECT 
  											* 
  										FROM 
  											" . DB_PREFIX . "avaliados 
  										WHERE 
  											avd_cpf = '" . $this->db->escape($cpf) . "' AND avd_status = '1'");

  		if ($aluno_query->num_rows) {
    		// filial id, ainda vou mecher
    		$this->session->data['fil_filiais_id'] = 2;
  			$this->session->data['cpf'] = $aluno_query->row['avd_cpf'];
  			$this->session->data['avd_avaliados_id'] = $aluno_query->row['avd_avaliados_id'];
  			$this->cpf = $aluno_query->row['avd_cpf'];
			$this->aluno = $aluno_query->row['avd_nome'];		
      		
      		$usuario_grupo_query = $this->db->query("SELECT 
      													usg_permissoes 
      												FROM 
      													" . DB_PREFIX . "usuarios_grupos 
      												WHERE 
      													usg_usuarios_grupos_id = '" . (int)$aluno_query->row['avd_usuarios_grupos_id'] . "'");
	  		
	  		$permissoes = unserialize($usuario_grupo_query->row['usg_permissoes']);

			if (is_array($permissoes)) {
				foreach ($permissoes as $key => $value) {
					$this->permissoes[$key] = $value;
				}
			}
		
      		return true;
    	} else {
      		return false;
    	}
  	}

	/**
	 * Metodo lembrar senha
	 *
	 * @access public
	 * @param string $cpf
	 * @return integer
	 */
  	public function cpfUser($cpf) 
  	{
  		// Limpa cpf
  		$cpf =  preg_replace('/[^0-9]/', '', $cpf);

  		$usuario_query = $this->db->query("SELECT 
  												* 
  											FROM 
  												" . DB_PREFIX . "usuarios 
  											WHERE 
  												usu_cpf = '" . $this->db->escape($cpf) . "' AND 
  												usu_status = '1' AND 
  												usu_usuarios_grupos_id = '1'");

    	if ($usuario_query->num_rows) {
    		// filial id, ainda vou mecher
    		$this->session->data['fil_filiais_id'] = 2;
    		// Remover porque adm usa
    		$this->session->data['filiais_id'] = 2;
			$this->session->data['usu_usuarios_id'] = $usuario_query->row['usu_usuarios_id'];
			$this->usu_usuarios_id = $usuario_query->row['usu_usuarios_id'];
			$this->usu_usuarios_grupos_id = $usuario_query->row['usu_usuarios_grupos_id'];
			$this->usu_login = $usuario_query->row['usu_login'];			

      		$usuario_grupo_query = $this->db->query("SELECT 
      													usg_permissoes 
      												FROM 
      													" . DB_PREFIX . "usuarios_grupos 
      												WHERE 
      													usg_usuarios_grupos_id = '" . (int)$usuario_query->row['usu_usuarios_grupos_id'] . "'");

	  		$permissoes = unserialize($usuario_grupo_query->row['usg_permissoes']);

			if (is_array($permissoes)) {
				foreach ($permissoes as $key => $value) {
					$this->permissoes[$key] = $value;
				}
			}

      		return $this->usu_usuarios_id;
    	} else {
      		return 0;
    	}
  	}

	/**
	 * Metodo login logoutUser
	 *
	 * @access public
	 * @return void
	 */
  	public function logoutUser() 
  	{
  		$session = new Session;
		$session->StartSession();

  		$session->Destroy('user');

		$this->act_accounts_id = '';
		$this->act_account_nome = '';
		$this->act_account_cpf = '';
		$this->act_account_email = '';
		
		session_destroy();
  	}

	/**
	 * Metodo login logoutAluno
	 *
	 * @access public
	 * @return void
	 */
  	public function logoutAluno() 
  	{
		unset($this->session->data['cpf']);
	
		$this->cpf = '';
		$this->aluno = '';
		
		session_destroy();
  	}

	/**
	 * Metodo hasPermissoes
	 *
	 * @access public
	 * @param string $key
	 * @param string $value
	 * @return booleam
	 */
  	public function hasPermissoes($key, $value) 
  	{
    	if (isset($this->permissoes[$key])) {
	  		return in_array($value, $this->permissoes[$key]);
		} else {
	  		return false;
		}
  	}
  
  	/**
	 * Metodo isLoggedUserAluno
	 *
	 * @access public
	 * @return integer
	 */
  	public function isLoggedUserAluno() 
  	{ 
  		if ($this->usu_usuarios_id) {
  			return $this->usu_usuarios_id;
  		} else {
  			return $this->cpf;
  		}
  	}

  	/**
	 * Metodo isLoggedUser
	 *
	 * @access public
	 * @return integer
	 */
  	public function isLoggedUser() 
  	{
  		return $this->act_account_nome;
  	}

  	/**
	 * Metodo isConfirmed
	 *
	 * @access public
	 * @return integer
	 */
  	public function isConfirmed() 
  	{
  		return $this->act_account_status;
  	}

  	/**
	 * Metodo isLoggedAluno
	 *
	 * @access public
	 * @return integer
	 */
  	public function isLoggedAluno() 
  	{
  		return $this->cpf;
  	}
  
    /**
	 * Metodo getId
	 *
	 * @access public
	 * @return string
	 */
  	public function getId() 
  	{
    	return $this->act_accounts_id;
  	}

  	/**
	 * Metodo getCPF
	 *
	 * @access public
	 * @return integer
	 */
  	public function getCPF() 
  	{
    	return $this->act_account_cpf;
  	}

    /**
	 * Metodo getGrupoId
	 *
	 * @access public
	 * @return integer
	 */
  	public function getUsuariosGruposId() 
  	{
    	return $this->usu_usuarios_grupos_id;
  	}
	
    /**
	 * Metodo getLogin
	 *
	 * @access public
	 * @return string
	 */
  	public function getLogin() 
  	{
    	return $this->usu_login;
  	}

    /**
	 * Metodo getAluno
	 *
	 * @access public
	 * @return string
	 */
  	public function getAluno() 
  	{
    	return $this->aluno;
  	}
}
?>