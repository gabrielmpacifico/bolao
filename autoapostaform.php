<?php 
session_start();
include 'conn.php';
include 'verificarlogin.php';

$id = $_POST['idusuario'];

if($id == null){
    header('Location: autoaposta.php');
    exit();
}

$hash = rand(1111, 9999) . "-" . rand(1111, 9999) . "-" . rand(1111, 9999) . "-" . rand(1111, 9999);


$sql = "INSERT INTO `bolao`.`auto_aposta` (`idusers`,`hash`,`sn_ativo`) VALUES (:id,:hash,'S')";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':hash', $hash);
$stmt->execute();

$_SESSION['sucesso'] = true;
header('Location: autoaposta.php');


?>

