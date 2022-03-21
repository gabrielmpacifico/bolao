<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idpartida = $_POST['idpartida'];
$novomandante = $_POST['novomandante'];
$novovisitante = $_POST['novovisitante'];

$sql = "UPDATE `bolao`.`partida` SET `mandante` = :novomandante, `visitante` = '$novovisitante' WHERE (`idpartida` = :idpartida);";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':novomandante', $novomandante);
$stmt->bindParam(':idpartida', $idpartida);
$stmt->execute();

$_SESSION['sucesso'] = true;
header('Location: addoficiais.php');
?>