<?php 

class conexion{
#attributes
	private $_localhost = 'localhost';
	private $_database = 'senatidb';
	private $_port = '3307';
	private $_charset = 'utf8';
	private $_username = 'root';
	private $_password = 'marin';
	protected $pdo = null;
	private $_attributes = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							PDO::ATTR_CASE => PDO::CASE_NATURAL,
							PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING];
	#end
	function getConnection(){
		try {
			$pdo = new PDO('mysql:host='.$this->_localhost.';
							dbname='.$this->_database.';
							port='.$this->_port.';
							charset='.$this->_charset.';',$this->_username,$this->_password,$this->_attributes);
		} catch (PDOException $exception) {
			//capture error_log
			# echo 'Error in: '.$exception->getMessage();
			# header('location:404/error_log.html');
		}
		return $pdo;
	}
}
?>