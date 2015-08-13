<?php

  class Ganhadores {

    private $tabela = 'gsia_ganhadores';
    private $tabela_id = 'gan_ganhadores_id';
    private $tabela_data_entrada = 'gan_data_registro';

    private $tabela_sorteios = 'gsia_sorteios';

    private $tabela_accounts = 'gsia_accounts';
    
    function addRegistro($data)
    {
      $querys = new Querys;

      // Data cadastro atual
      $data[$this->tabela_data_entrada] = date('Y-m-d H:i:s');

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
                  g.*,
                  s.*,
                  a.*
                FROM  
                  " . $this->tabela . " g
                LEFT JOIN
                  " . $this->tabela_sorteios . " s ON (s.sor_sorteios_id = gan_sorteios_id)
                LEFT JOIN
                  " . $this->tabela_accounts . " a ON (a.act_accounts_id = gan_accounts_id)";
      
      if (isset($data['act_accounts_id'])) {
        if (! $user->CheckLogin($session->data)) {
          header('Location: ' . DIR_DOCS . 'logout/');
        }
        $sql .= " WHERE 
                    g.gan_accounts_id = '" . $data['act_accounts_id'] . "'";
      }

      $query = $querys->query($sql);

      return $query->rows;
    }

    /**
     * Metodo CheckGanhador
     *
     * @access public
     * @param integer $sorteio_id
     * @return integer
     */
    public function CheckGanhador($sorteio_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "SELECT 
                  g.*,
                  a.act_account_nome,
                  a.act_accounts_id,
                  a.act_account_sobrenome
                FROM  
                  " . $this->tabela . " g
                LEFT JOIN
                  " . $this->tabela_accounts . " a ON (a.act_accounts_id = g.gan_accounts_id)
                WHERE 
                 g.gan_sorteios_id = '" . (int)$sorteio_id . "'";
      
      $query = $querys->query($sql);
      
      if ($query->num_rows > 0) {
        return $query->row;
      } else {
        return $query->num_rows;
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