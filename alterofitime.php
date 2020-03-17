<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idpartida = $_POST['idpartida'];
$novomandante = $_POST['timemandante'];
$novovisitante = $_POST['timevisitante'];

$sql = "UPDATE `bolao`.`partida` SET `timemandante` = '$novomandante', `timevisitante` = '$novovisitante' WHERE (`idpartida` = '$idpartida');";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':novomandante', $novomandante);
$stmt->bindParam(':idpartida', $idpartida);
$stmt->execute();

header('Location: addoficiais.php');
?>