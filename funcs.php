<?php
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
  }
  
function db_conn(){
  try {
      $db_name = 'dsc_db';
      $db_id   = 'root';
      $db_pw   = '';
      $db_host = 'localhost';
      return $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
  } catch (PDOException $e) {
      exit('DB Connection Error:' . $e->getMessage());
  }
}

function n($num){
  return number_format($num);
}

function sql_error($stmt){
  $error = $stmt->errorInfo();
  exit('SQLError:' . $error[2]);
}

function loginCheck(){
  if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()){
      exit('LOGIN ERROR');
  } else {
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
  }
}