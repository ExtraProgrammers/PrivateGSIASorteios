<?php

  class ProdutosInfo {

    private $tabela = 'gsia_produtos_info';
    private $tabela_id = 'pro_produtos_id';

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
                  pro_produto_status = '1'";

      // Ordenar por
      if (isset($data['sortname'])) {
        $sql .= " ORDER BY " . $data['sortname']; 
      } else {
        $sql .= " ORDER BY pro_produto_valor";  
      }
      
      // Tipo ordenção
      if (isset($data['sortorder']) && ($data['sortorder'] == 'DESC')) {
        $sql .= " DESC";
      } else {
        $sql .= " ASC";
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
                  *
                FROM  
                  " . $this->tabela . "
                WHERE 
                  pro_produtos_id = '" . (int)$registro_id . "'";
      
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