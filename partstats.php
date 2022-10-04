<?php 
include 'conn.php';
include 'menu.html';

if (isset($_GET['idpartida'])) {
    $idpartida = $_GET['idpartida'];

    $sql = "SELECT * FROM bolao.partida where idpartida = :idpartida;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idpartida', $idpartida);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if(!$row){
        echo '<h2>Partida não encontrada</h2>';
        exit();
    }

    echo '<div class="nome">';
    echo '<table style="width: 100%;"><tr>
    <td align="left" style="width:40%;"><h1>'.$row->timemandante.'</h1></td>
    <td style="width:20%;"><h1>'.$row->mandante.' x '.$row->visitante.'</h1></td>
    <td align="right" style="width:40%;"><h1>'.$row->timevisitante.'</h1></td>
    </tr></table>';
    echo '</div>';

    echo '<div class="container">';
    echo    '<div class="row">';
    echo        '<div class="col">';
                    $sql = "SELECT SUM(pontosporjogo) AS pontos FROM aposta WHERE idpartida = '$idpartida';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_OBJ);
    echo            '<h4>Pontos somados que os participantes fizeram nesta partida: '.$row->pontos.'</h4><hr/>';
    echo        '</div>';
    echo        '<div class="col">';
    echo            '<div class="exatasnome">';
    echo                '<h2>Participantes que acertaram o resultado</h2><hr/>';
                        $sql = "SELECT u.nome FROM aposta a,users u WHERE u.idusers = a.idusers AND a.pontosporjogo = 10 AND idpartida = '$idpartida' order by u.nome;";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();  
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                            echo '<h4>'.$row->nome.'</h4>';
                        }
    echo            '</div>';
    echo        '</div>';
    echo    '</div>';
    echo '</div>';

}else{echo '<h2>Partida não encontrada</h2>';}

?>

<style>
    div.col{
        text-align: center;
        border: 3px solid yellow;
    }
    div.container{
        margin-top: 60px;
    }
    div.nome{
        width:800px;
        height:60px;
        border: 1px solid yellow;
        margin: auto;
        color: white;
        margin-bottom:5px;
        margin-top: 40px;
        color:#CCCC00;
        text-align: center;
        line-height: 100px;
        font-size: 40px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    a:hover { 
        text-decoration:none;   
    }  
    h2,h4{
        color:#CCCC00;
    }
</style>
