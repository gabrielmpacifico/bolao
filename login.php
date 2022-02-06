<?php
session_start();
include 'conn.php';

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: regras.php');
    exit();
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$senhacrip = sha1($senha);

$sql = "SELECT usuario FROM bolao.admin WHERE usuario = :usuario AND BINARY senha = :senhacrip";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario', $usuario);
$stmt->bindParam(':senhacrip', $senhacrip);
$stmt->execute();
$admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($admin) <= 0)
{
    $_SESSION['loginincorreto'] = true;
    header('Location: regras.php');
    exit;
}

$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
header('Location: panel.php');

?>
