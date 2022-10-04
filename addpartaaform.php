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
        header('Location: autoaposta.php');
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

    $sql = "INSERT INTO `bolao`.`aposta` (`idpartida`, `idusers`, `mandante`, `visitante`, `pontosporjogo`) VALUES (:cont, :idusers, '0', '0', '0');";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bindParam(':cont', $cont);$stmt2->bindParam(':idusers', $idusers);
    $stmt2->execute();

    $cont = $cont + 1;
}

$hash = rand(1111, 9999) . "-" . rand(1111, 9999) . "-" . rand(1111, 9999) . "-" . rand(1111, 9999);


$sql = "INSERT INTO `bolao`.`auto_aposta` (`idusers`,`hash`,`sn_ativo`) VALUES (:id,:hash,'S')";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $idusers);
$stmt->bindParam(':hash', $hash);
$stmt->execute();

$_SESSION['sucesso'] = true;
header('Location: autoaposta.php');


    
    
    



?>