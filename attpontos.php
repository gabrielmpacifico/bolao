<?php
session_start();
include 'conn.php';
include 'verificarlogin.php';


$sql = "SELECT aposta.idpartida,aposta.idusers,aposta.mandante as am,aposta.visitante as av,partida.mandante as pm,partida.visitante as pv FROM bolao.aposta INNER JOIN bolao.partida ON aposta.idpartida = partida.idpartida WHERE partida.mandante IS NOT NULL AND aposta.mandante IS NOT NULL;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){

    //SE ACERTAR O RESULTADO
    if($row->am == $row->pm && $row->av == $row->pv){
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 10 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();
    
    //SE ACERTAR O PLACAR DO TIME VENCEDOR
    }else if(($row->am > $row->av && $row->pm > $row->pv && $row->am == $row->pm) ||
    ($row->av > $row->am && $row->pv > $row->pm && $row->av == $row->pv)){
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 6 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();
    
    //SE ACERTAR O EMPATE
    }else if($row->am == $row->av && $row->pm == $row->pv){
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 4 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();
    
    //SE ACERTAR O TIME VENCEDOR
    }else if(($row->am > $row->av && $row->pm > $row->pv) ||
    ($row->av > $row->am && $row->pv > $row->pm)){
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 2 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();

    //SE ACERTAR QUALQUER PLACAR
    }else if($row->am == $row->pm || $row->av == $row->pv) {
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 1 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();
    }else{
        $sql = "UPDATE `bolao`.`aposta` SET `pontosporjogo` = 0 WHERE `idusers` = :idusers AND `idpartida` = :idpartida";
        $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':idusers', $row->idusers);
        $stmt2->bindParam(':idpartida', $row->idpartida);$stmt2->execute();
    }
}

//SOMA DE PONTUAÇÃO DE CADA USUÁRIO
$sql = "SELECT idusers,sum(pontosporjogo) as soma FROM bolao.aposta GROUP BY idusers;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    $sql = "UPDATE `bolao`.`users` SET `pontos` = :soma WHERE `idusers` = :idusers";
    $stmt2 = $conn->prepare($sql);$stmt2->bindParam(':soma', $row->soma);
    $stmt2->bindParam(':idusers', $row->idusers);$stmt2->execute();
}

$_SESSION['pontos'] = true;
header('Location: panel.php');
?>