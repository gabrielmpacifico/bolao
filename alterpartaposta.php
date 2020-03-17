<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idusuario = $_POST['idusuario'];
$idpartida = $_POST['idpartida'];
$novomandante = $_POST['novomandante'];
$novovisitante = $_POST['novovisitante'];

$sql = "UPDATE `bolao`.`aposta` SET `mandante` = :novomandante, `visitante` = :novovisitante WHERE (`idpartida` = :idpartida) AND (`idusers` = :idusuario);";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':novomandante', $novomandante);
$stmt->bindParam(':novovisitante', $novovisitante);
$stmt->bindParam(':idpartida', $idpartida);
$stmt->bindParam(':idusuario', $idusuario);
$stmt->execute();

header('Location: alterpart.php');
?>