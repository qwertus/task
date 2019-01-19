<?php

$path = dirname(__DIR__, 1);

require_once $path . '/includes/config.php';

class DB {

    private $pdo;
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {

            return self::$instance = new DB();
        }

        return self::$instance;
    }

    private function __construct() {

        $host = $GLOBALS['config']['mysql']['host'];
        $db = $GLOBALS['config']['mysql']['name'];
        $username = $GLOBALS['config']['mysql']['username'];
        $password = $GLOBALS['config']['mysql']['password'];

        try {


            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//            echo "Connected";
        
            
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }

        return $this->pdo;
    }
    
    public function prepare($query) {
        
        return $this->pdo->prepare($query);
    }
    
    public function execute() {
        
        return $this->pdo->execute();
    }

}
