<?php
require_once dirname(__DIR__) . '/config.php';

class Db{

	private static $instance;
	private $connection;	
	private $db_host = DB_HOST;
	private $db_name = DB_NAME;
	private $db_user = DB_USER;
	private $db_pass = DB_PASS;

	public static function getInstance()
    {
        if (!self::$instance) { 
            self::$instance = new self();
        }
        return self::$instance;
    }

	private function __construct()
	{
		try {
			$this->connection = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', $this->db_user, $this->db_pass);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	private function __clone(){}

    public function connect()
    {
        return $this->connection;
    }

}

?>