<?php
session_start();
require_once('funcs.php');
loginCheck();
$id = $_GET['id'];

$pdo = db_conn();

$stmt = $pdo->prepare('DELETE FROM dsc_request WHERE id = :id; ');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
    exit('SQLError:' . print_r($error, true));
} else {
    redirect('select.php');
}