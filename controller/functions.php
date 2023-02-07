<?php

require_once 'config/conexion.php';
define('title', '- Registros', true);


class pagination{

    public $_cRegistros = 5;
    private $db = null;
/**star instance*/
    function __construct()
    {
        $obj = new conexion();
        $this->db = $obj->getConnection();
    }
/**finish instance*/
    function Registers(){
        $value = $this->_cRegistros;
        $statement = $this->db->prepare('SELECT *FROM datos_usuarios LIMIT :parame');
        $statement->bindParam(':parame', $value, PDO::PARAM_INT);
        $statement->execute();
        $resultates = $statement->fetchAll(PDO::FETCH_OBJ);
        return $resultates;
    }
    function totalRegisters(){
        $obj = new conexion();
        $db = $obj->getConnection();
        $stmt = $db->prepare('SELECT COUNT(*) FROM datos_usuarios');
        $stmt->execute();
        $registros = $stmt->fetchColumn();
    
        return $registros;
    }
}



?>
