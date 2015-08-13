<?php

  class Querys {
      var $ip = "localhost";
      var $user = "root";
      var $pass = "usbw";
      var $database = "db_gsiasorteios";
    
     function AbreConexao() {
        $this->conn = mysql_connect ($this->ip,$this->user,$this->pass); // aqui declaramos a var conn como variável da classe
        mysql_select_db ( $this->database, $this->conn); 
        return $this->conn;
        // esse "$this->" ele e utilizado para referenciar uma variável da classe
     }
   
    function FechaConexao() {
        mysql_close ($this->conn); // aqui fecho a conexão se baseando na variável acima declarada
    } 
    
    public function query($sql) 
    {
      if ($this->AbreConexao()) {
        $resource = mysql_query($sql, $this->conn);
    
        if ($resource) {
          if (is_resource($resource)) {
            $i = 0;
        
            $data = array();
        
            while ($result = mysql_fetch_assoc($resource)) {
              $data[$i] = $result;
        
              $i++;
            }

            // Data fields
            $fields = array();

            $j = 0;

            while ($j <  mysql_num_fields($resource)) {
              $field = mysql_fetch_field($resource, $j);

              $fields['nome'][] = $field->name;
              $fields['tipo'][] = $field->type;

              $j++;
            }
          
            mysql_free_result($resource);
            
            $query = new stdClass();
            $query->row = isset($data[0]) ? $data[0] : array();
            $query->rows = $data;
            $query->num_rows = $i;
            $query->fields = $fields;
            
            unset($data);
            
            $this->FechaConexao();

            return $query;  
          } else {

            return true;
          }
        } else {
          trigger_error('Error: ' . mysql_error($this->conn) . '<br />Error No: ' . mysql_errno($this->conn) . '<br />' . $sql);
          exit();
        }
      }
    }

    public function escape($value) 
    {
      $this->AbreConexao();

      if ($this->conn) {
        return mysql_real_escape_string($value, $this->conn);
      }

      $this->FechaConexao();
    }
    
    public function countAffected() 
    {
      $this->AbreConexao();

      if ($this->conn) {
          return mysql_affected_rows($this->conn);
      }

      $this->FechaConexao();
    }

    public function getLastId() 
    {
      $this->AbreConexao();

      if ($this->conn) {
          return mysql_insert_id($this->conn);
      }

      $this->FechaConexao();
    }

    function GetConfig($cfg_nome) {        
        $query = "SELECT 
                      * 
                    FROM 
                      gsia_configuracoes 
                    WHERE 
                      cfg_configuracoes_nome = '" . $cfg_nome . "'";

        $result = $this->query($query);

        if ($result->num_rows > 0) {
          $result = $result->rows;
        } else {
          $result = '';
        }

       return $result[0]; // aqui fica o retorno de todas as condicionais
    }

    function CheckValueExists($cfg_name, $value) {   
      $query = "SELECT 
                    * 
                  FROM 
                    gsia_accounts 
                  WHERE 
                    " . $cfg_name . " = '" . $value . "'";

        $result = $this->query($query);

        if ($result->num_rows > 0) {
          $result = $result->row;
        } else {
          $result = $result->num_rows;
        }

       return $result; // aqui fica o retorno de todas as condicionais   
    }

  } 
?>