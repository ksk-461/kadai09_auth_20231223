<?php

session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM dsc_user_table WHERE lid = :lid;');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if($status === false){
    sql_error($stmt);
}

$val = $stmt->fetch();

if($val['id'] != '' && password_verify($lpw, $val['lpw'])){ 
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    header('Location: select.php');
}else{
    header('Location: login.php');
}

exit();