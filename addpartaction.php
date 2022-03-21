<?php 
session_start();
include 'conn.php';
include 'verificarlogin.php';

$nome = $_POST['nome'];

$sql = "SELECT nome FROM bolao.users;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    if(strtolower($nome) == strtolower($row->nome)){
        $_SESSION['usuario_existe'] = true;
        header('Location: addpart.php');
        exit();
    }
}

$sql = "INSERT INTO `bolao`.`users` (`nome`,`pontos`) VALUES (:nome,'0')";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->execute();

$sql = "SELECT idusers FROM `bolao`.`users` WHERE nome = :nome";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);
$idusers = $row->idusers;

$cont = 1;

$sql = "SELECT idpartida FROM bolao.partida;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($stmt->fetch(PDO::FETCH_OBJ)){
    $a = $_POST['a'.$cont];
    $b = $_POST['b'.$cont];

    $sql = "INSERT INTO `bolao`.`aposta` (`idpartida`, `idusers`, `mandante`, `visitante`, `pontosporjogo`) VALUES (:cont, :idusers, :a, :b, '0');";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bindParam(':cont', $cont);$stmt2->bindParam(':idusers', $idusers);
    $stmt2->bindParam(':a', $a);$stmt2->bindParam(':b', $b);
    $stmt2->execute();

    $cont = $cont + 1;
}
$_SESSION['sucesso'] = true;
header('Location: addpart.php');

?>