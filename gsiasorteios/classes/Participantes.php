<?php

  class Participantes {

    private $tabela = 'gsia_participantes';
    private $tabela_id = 'par_participantes_id';
    private $tabela_data_entrada = 'par_data_entrada';

    private $tabela_sorteios = 'gsia_sorteios';

    private $tabela_produtos = 'gsia_produtos';
    
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
                  p.*,
                  s.*,
                  r.*
                FROM  
                  " . $this->tabela . " p
                LEFT JOIN
                  " . $this->tabela_sorteios . " s ON (s.sor_sorteios_id = par_sorteios_id)
                LEFT JOIN
                  " . $this->tabela_produtos . " r ON (r.pro_produtos_id = sor_produtos_id)";
      
      if (isset($data['act_accounts_id'])) {
        if (! $user->CheckLogin($session->data)) {
          echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
        }
        $sql .= " WHERE 
                    p.par_accounts_id = '" . $data['act_accounts_id'] . "'";
      }

      $query = $querys->query($sql);

      return $query->rows;
    }

    /**
     * Metodo CheckUserSorteio
     *
     * @access public
     * @param integer $user_id
     * @param integer $sorteio_id
     * @return integer
     */
    public function CheckUserSorteio($user_id, $sorteio_id) 
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
                  par_sorteios_id = '" . (int)$sorteio_id . "' AND
                  par_accounts_id = '" . (int)$user_id . "'";
      
      $query = $querys->query($sql);
      
      return $query->num_rows;
    }

    /**
     * Metodo getCountSorteios
     *
     * @access public
     * @param integer $sorteios_id
     * @return array
     */
    public function getCountSorteios($sorteios_id)
    {
      $querys = new Querys;

      $sql = "SELECT 
                  par_accounts_id
                FROM  
                  " . $this->tabela . "
                WHERE 
                  par_sorteios_id = '" . (int)$sorteios_id . "'";

      $result = $querys->query($sql);

      return $result->rows;
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