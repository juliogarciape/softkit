<?php

class Database{
    
    private static $db = 'softkit';
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $cont = null;
    
    public function __construct() {
		die('No esta Permitido Instanciar la Conexion');
	}

	public static function connect(){
        if (null == self::$cont){
            try{
                self::$cont = new PDO("mysql:host=".self::$host.";"."dbname=".self::$db, self::$user,self::$password);
                $dbh = self::$cont;
                $dbh->exec("set names utf8");
                $dbh->exec("SET lc_time_names = 'es_PE'");
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        
        return self::$cont;
	}
}

?>