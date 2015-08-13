<?php

  class Sorteios {

    private $tabela = 'gsia_sorteios';
    private $tabela_id = 'sor_sorteios_id';

    private $tabela_produtos = 'gsia_produtos';
    private $tabela_produtos_id = 'sor_produtos_id';

    private $tabela_data_sorteio = 'sor_sorteio_data';
    private $tabela_limite = 'sor_sorteio_limite';
    
    function addRegistro($data)
    {
      $querys = new Querys;

      // Data cadastro atual
      $data[$this->tabela_data_cadastro] = date('Y-m-d H:i:s');

      // Transforma senha em MD5
      $data[$this->tabela_senha] = $querys->escape(md5($data[$this->tabela_senha]));

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
     * @param boolean $index
     * @param array $data
     * @return array
     */
    public function getRegistros($index, $data = array()) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      $user->CheckLogin($session->data);
      $querys = new Querys;

      $sql = "SELECT 
                  s.*,
                  p.*
                FROM  
                  " . $this->tabela . " s
                LEFT JOIN
                  " . $this->tabela_produtos . " p ON (p.pro_produtos_id = sor_produtos_id)";
        
      if ($index) {
        $sql .= "WHERE 
                  s.sor_sorteio_status = '0'";
      }                   
      
      // Ordenar por
      if (isset($data['sortname'])) {
        $sql .= " ORDER BY " . $data['sortname']; 
      } else {
        $sql .= " ORDER BY s.sor_sorteio_data";  
      }
      
      // Tipo ordenção
      if (isset($data['sortorder']) && ($data['sortorder'] == 'ASC')) {
        $sql .= " ASC";
      } else {
        $sql .= " DESC";
      }

      $query = $querys->query($sql);

      return $query->rows;
    }

    /**
     * Metodo getRegistros
     *
     * @access public
     * @param array $data
     * @return array
     */
    public function getRegistro($registro_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "SELECT 
                  s.*,
                  p.*
                FROM  
                  " . $this->tabela . " s
                LEFT JOIN
                  " . $this->tabela_produtos . " p ON (p.pro_produtos_id = sor_produtos_id)
                WHERE 
                  s.sor_sorteios_id = '" . (int)$registro_id . "'";
      
      $query = $querys->query($sql);

      return $query->row;
    }

    /**
     * Metodo getValue
     *
     * @access public
     * @param array $data
     * @return array
     */
    public function getValue($value, $registro_id) 
    {
      $session = new Session;
      $session->StartSession();
      $querys = new Querys;

      $sql = "SELECT 
                  " . $value . "
                FROM  
                  " . $this->tabela . "
                WHERE 
                  sor_sorteios_id = '" . (int)$registro_id . "'";
      
      $query = $querys->query($sql);

      if ($query->num_rows > 0) {
        return $query->row[$value];
      } else {
        return '';
      }
    }

    /**
     * Metodo ConfirmSorteio
     *
     * @access public
     * @param array $data
     * @return array
     */
    public function ConfirmSorteio($registro_id) 
    {
      $session = new Session;
      $session->StartSession();
      $user = new User;
      if (! $user->CheckLogin($session->data)) {
        echo "<script>document.location.href='" . DIR_DOCS . "logout/'</script>";
      }
      $querys = new Querys;

      $sql = "UPDATE 
                  " . $this->tabela . " 
                SET 
                  sor_sorteio_status = '1'
                WHERE 
                  sor_sorteios_id = '" . (int)$registro_id . "'";
      
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