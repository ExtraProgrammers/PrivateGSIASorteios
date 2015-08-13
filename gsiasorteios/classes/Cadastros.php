<?php

  class Cadastros {

    private $tabela = 'gsia_accounts';
    private $tabela_id = 'act_accounts_id';
    private $tabela_data_cadastro = 'act_account_data_cadastro';
    private $tabela_senha = 'act_account_senha';
    private $tabela_cpf = 'act_account_cpf';
    
    function addRegistro($data)
    {
      $querys = new Querys;

      // Data cadastro atual
      $data[$this->tabela_data_cadastro] = date('Y-m-d H:i:s');

      // Transforma senha em MD5
      $data[$this->tabela_senha] = $querys->escape(md5($data[$this->tabela_senha]));

      // CPF sem ponto e traço
      $valor = $data[$this->tabela_cpf];

      $valor = str_replace(".", "", $valor);
      $valor = str_replace(",", "", $valor);
      $valor = str_replace("-", "", $valor);
      $valor = str_replace("/", "", $valor);

      $data[$this->tabela_cpf] = $valor;

      // Retorna todos os campos da tabela
      $result = $this->getCampos();
      
      // Monta sql
      $sql = "INSERT INTO " . $this->tabela . " SET ";

      foreach ($result['nome'] as $key => $campo) {
        if ((isset($data[$result['nome'][$key]])) && (!empty($data[$result['nome'][$key]]))) {
          if ($result['tipo'][$key] == 'int') {
            $sql .= $result['nome'][$key] . " = '" . (int)$data[$result['nome'][$key]] . "', ";
          } else if ($result['tipo'][$key] == 'real') {
            $sql .= $result['nome'][$key] . " = " . floatval($data[$result['nome'][$key]]) . ", ";
          } else {
            $sql .= $result['nome'][$key] . " = '" . $querys->escape($data[$result['nome'][$key]]) . "', ";
          }
        }
      }

      $sql = substr(trim($sql), 0, -1);

      $result = $querys->query($sql);

      return $result;
    }   

    /**
     * Metodo editRegistro
     *
     * @access public
     * @param integer $registro_id
     * @param array $data
     * @return void
     */
    public function editRegistro($registro_id, $data)
    {
      $querys = new Querys;

      // Transforma senha em MD5
      $data[$this->tabela_senha] = $querys->escape(md5($data[$this->tabela_senha]));

      // CPF sem ponto e traço
      $valor = $data[$this->tabela_cpf];

      $valor = str_replace(".", "", $valor);
      $valor = str_replace(",", "", $valor);
      $valor = str_replace("-", "", $valor);
      $valor = str_replace("/", "", $valor);

      $data[$this->tabela_cpf] = $valor;

      // Retorna todos os campos da tabela
      $result = $this->getCampos();

      // Monta sql
      $sql = "UPDATE " . $this->tabela . " SET ";

      foreach ($result['nome'] as $key => $campo) {
        if ((isset($data[$result['nome'][$key]])) && (!empty($data[$result['nome'][$key]]))) {
          if ($result['tipo'][$key] == 'int') {
            $sql .= $result['nome'][$key] . " = '" . (int)$data[$result['nome'][$key]] . "', ";
          } else if ($result['tipo'][$key] == 'real') {
            $sql .= $result['nome'][$key] . " = " . floatval($data[$result['nome'][$key]]) . ", ";
          } else {
            $sql .= $result['nome'][$key] . " = '" . $querys->escape($data[$result['nome'][$key]]) . "', ";
          }
        }
      }

      $sql = substr(trim($sql), 0, -1);

      $sql .= " WHERE " . $this->tabela_id . " = " . (int)$registro_id;

      $result = $querys->query($sql);

      return $result;
    }

    /**
     * Metodo getRegistros
     *
     * @access public
     * @param array $data
     * @return array
     */
    public function getRegistros($data = array()) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      $user->CheckLogin($session->data);
      $querys = new Querys;

      $sql = "SELECT 
                  *
                FROM  
                  " . $this->tabela . "
                WHERE 
                  act_accounts_id = '" . $user->getId() . "'";
      
      $query = $querys->query($sql);

      return $query->rows;
    }

    /**
     * Metodo CheckCPFExists
     *
     * @access public
     * @param string $cpf
     * @return boolean
     */
    public function CheckCPFExists($cpf) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      $user->CheckLogin($session->data);
      $querys = new Querys;

      $sql = "SELECT 
                  *
                FROM  
                  " . $this->tabela . "
                WHERE 
                  act_account_cpf = '" . $cpf . "'";
      
      $query = $querys->query($sql);
      //print_r($query->num_rows);
      //exit;
      if ($query->num_rows == 0) {
        return false;
      } else {
        return true;
      }
    }

    /**
     * Metodo getCampos
     *
     * @access public
     * @return array
     */
    public function getCampos()
    {
      $querys = new Querys;

      $sql = "SELECT * FROM " . $this->tabela;

      $result = $querys->query($sql);

      return $result->fields;
    }
  } 
?>