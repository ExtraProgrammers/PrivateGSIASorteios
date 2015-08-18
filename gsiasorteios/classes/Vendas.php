<?php

  class Vendas {

    private $tabela = 'gsia_produtos_vendas';
    private $tabela_id = 'vnd_vendas_id';
    private $tabela_transaction_id = 'vnd_transaction_id';
    private $tabela_data_cadastro = 'vnd_data_cadastro';
    private $tabela_data_alteracao = 'vnd_data_alteracao';
    
    function addRegistro($data)
    {
      $querys = new Querys;

      // Data cadastro atual
      $data[$this->tabela_data_cadastro] = date('Y-m-d H:i:s');

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

      // Insere a data de ultima alteração
      $data[$this->tabela_data_alteracao] = date('Y-m-d H:i:s');

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

      $sql .= " WHERE " . $this->tabela_transaction_id . " = '" . $registro_id . "'";

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
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
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
     * Metodo getRegistro
     *
     * @access public
     * @param int $registro_id
     * @return array
     */
    public function getRegistro($registro_id) 
    {
      $session = new Session;
      $session->StartSession();
      $querys = new Querys;

      $sql = "SELECT 
                  *
                FROM  
                  " . $this->tabela . "
                WHERE 
                  vnd_transaction_id = '" . $registro_id . "'";
      
      $query = $querys->query($sql);

      return $query->row;
    }

    /**
     * Metodo getAprovadas
     *
     * @access public
     * @param int $act_accounts_id
     * @return array
     */
    public function getAprovadas($act_accounts_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "SELECT 
                  COUNT(*) as count
                FROM  
                  " . $this->tabela . "
                WHERE 
                  vnd_accounts_id = '" . $act_accounts_id . "' AND
                  (vnd_status = '3' OR 
                  vnd_status = '4')";
      
      $query = $querys->query($sql);

      return $query->row['count'];
    }

    /**
     * Metodo getPendentes
     *
     * @access public
     * @param int $act_accounts_id
     * @return array
     */
    public function getPendentes($act_accounts_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "SELECT 
                  COUNT(*) as count
                FROM  
                  " . $this->tabela . "
                WHERE 
                  vnd_accounts_id = '" . $act_accounts_id . "' AND
                  (vnd_status = '1' OR 
                  vnd_status = '2' OR 
                  vnd_status = '5' OR 
                  vnd_status = '9')";
      
      $query = $querys->query($sql);

      return $query->row['count'];
    }

    /**
     * Metodo getCanceladas
     *
     * @access public
     * @param int $act_accounts_id
     * @return array
     */
    public function getCanceladas($act_accounts_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "SELECT 
                  COUNT(*) as count
                FROM  
                  " . $this->tabela . "
                WHERE 
                  vnd_accounts_id = '" . $act_accounts_id . "' AND
                  (vnd_status = '6' OR 
                  vnd_status = '7' OR 
                  vnd_status = '8')";
      
      $query = $querys->query($sql);

      return $query->row['count'];
    }

    /**
     * Metodo CheckCPFExists
     *
     * @access public
     * @param string $cpf
     * @return boolean
     */
    public function CheckVendaExists($vnd_transaction_id) 
    {
      $session = new Session;
      $session->StartSession();
      $querys = new Querys;

      $sql = "SELECT 
                  *
                FROM  
                  " . $this->tabela . "
                WHERE 
                  vnd_transaction_id = '" . $vnd_transaction_id . "'";
      
      $query = $querys->query($sql);

      if ($query->num_rows == 0) {
        return false;
      } else {
        return true;
      }
    }

    /**
     * Metodo UpdateEntregue
     *
     * @access public
     * @param string $vnd_transaction_id
     * @return array
     */
    public function UpdateEntregue($vnd_transaction_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      $querys = new Querys;

      $sql = "UPDATE 
                  " . $this->tabela . " 
                SET 
                  vnd_venda_entregue = '1'
                WHERE 
                  vnd_transaction_id = '" . $vnd_transaction_id . "'";
      
      $query = $querys->query($sql);

      return $query;
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