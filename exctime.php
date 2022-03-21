<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idpartida = $_POST['idpartidaexc'];

$sql = "SELECT idpartida FROM bolao.aposta WHERE idpartida = :idpartidaexc";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idpartidaexc', $idpartida);
$stmt->execute();
$existe = $stmt->fetchColumn();

if($existe > 0){
    $_SESSION['erroexc'] = true;
    header('Location: addoficiais.php');
}else{
    $sql = "DELETE FROM bolao.partida WHERE idpartida = :idpartidaexc";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idpartidaexc', $idpartida);
    $stmt->execute();

    $_SESSION['sucesso'] = true;
    header('Location: addoficiais.php');
}


?>