<?php
 require("config.php");

 class db{
 private static $pdo;

  public static function connection(){
    if(!isset(self::$pdo)){
      try {
        self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
      }catch(PDOException $con) {
        echo $con->getMessage();
      }
    }
    return self::$pdo;
  }
    public static function examPrepare($sql){
    return self::connection()->prepare($sql);
  }
 }

?>
