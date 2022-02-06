<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idpartida = $_POST['idpartida'];
$novomandante = $_POST['timemandante'];
$novovisitante = $_POST['timevisitante'];

$sql2 = "SELECT idpartida as id FROM bolao.partida WHERE (`idpartida` = '$idpartida');";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

$row = $stmt2->fetch(PDO::FETCH_OBJ);
if (!isset($row->id)) {
    $sql = "INSERT INTO `bolao`.`partida` (idpartida, timemandante, timevisitante) VALUES (:idpartida, :novomandante, :novovisitante);";
}else{
    $sql = "UPDATE `bolao`.`partida` SET `timemandante` = :novomandante, `timevisitante` = :novovisitante WHERE (`idpartida` = :idpartida);";
}


$stmt = $conn->prepare($sql);
$stmt->bindParam(':novomandante', $novomandante);
$stmt->bindParam(':idpartida', $idpartida);
$stmt->bindParam(':novovisitante', $novovisitante);
$stmt->execute();

header('Location: addoficiais.php');
?>