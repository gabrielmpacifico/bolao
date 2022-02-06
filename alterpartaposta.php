<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idusuario = $_POST['idusuario'];
$idpartida = $_POST['idpartida'];
$novomandante = $_POST['novomandante'];
$novovisitante = $_POST['novovisitante'];

$sql2 = "SELECT idpartida as id FROM bolao.aposta WHERE (`idpartida` = '$idpartida') AND (`idusers` = '$idusuario');";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();

$row = $stmt2->fetch(PDO::FETCH_OBJ);
if (!isset($row->id)) {
    $sql = "INSERT INTO `bolao`.`aposta` (mandante, visitante, idpartida, idusers) VALUES (:novomandante, :novovisitante, :idpartida, :idusuario);";
}else{
    $sql = "UPDATE `bolao`.`aposta` SET `mandante` = :novomandante, `visitante` = :novovisitante WHERE (`idpartida` = :idpartida) AND (`idusers` = :idusuario);";
}


$stmt = $conn->prepare($sql);
$stmt->bindParam(':novomandante', $novomandante);
$stmt->bindParam(':novovisitante', $novovisitante);
$stmt->bindParam(':idpartida', $idpartida);
$stmt->bindParam(':idusuario', $idusuario);
$stmt->execute();

header('Location: alterpart.php');
?>