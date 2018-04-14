<?php

  session_start();


function connection(){
  $db_host = 'localhost';
  $db_name = 'DB';
  $db_user = 'root';
  $db_pass = '123';

  try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    return $db;
  } catch(PDOException $e){
    echo "Error: ". $e->getMessage();
    die();
  }
}

?>