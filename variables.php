<?php
  function connectDB(){
    $host = 'sql.otherwize.fr';
    $dbName = 'wd5tjb_owdb1';
    $userDB = 'wd5tjb_owdb1';
    $passwordDB = '0502marius';
    $dsn = "mysql:dbname=".$dbName.";host=".$host.";charset=utf8";
    try{
      return new PDO($dsn, $userDB, $passwordDB);
    }catch(Exception $e){
      die("connection impossible a la base de donnee " . $dbName);
    }
  }
  /*
  $host = 'localhost';
  $dbName = 'blog2';
  $userDB = 'root';
  $passwordDB = 'password';
  */
?>
