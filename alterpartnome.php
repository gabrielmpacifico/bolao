<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';

$idusuario = $_POST['idusuario'];
$novonome = $_POST['novonome'];

$sql = "SELECT nome FROM bolao.users;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    if(strtolower($novonome) == strtolower($row->nome)){
        $_SESSION['usuario_existe'] = true;
        header('Location: alterpart.php');
        exit();
    }
}

$sql = "UPDATE `bolao`.`users` SET `nome` = :novonome WHERE (`idusers` = :idusuario);";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':novonome', $novonome);
$stmt->bindParam(':idusuario', $idusuario);
$stmt->execute();

header('Location: alterpart.php');
?>