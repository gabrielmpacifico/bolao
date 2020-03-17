<?php
include 'conn.php';
include 'menu.html';

echo '<div class="partdiv">';
echo '<h1 class="partnum">RANKING</h1>' ;
echo '</div>' ;
$count = 1;
$sql = "SELECT Nome,Pontos FROM bolao.users ORDER BY pontos desc;";
$stmt = $conn->prepare($sql);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    echo '<a href="pesquisar.php?participante='.$row->Nome.'"> <div class="nome">';
    echo '<table style="width:100%;">
    <tr>
    <td align="left" style="width:15%;">'.$count.'</td>
    <td align="center" style="width:70%;">'.$row->Nome.'</td>
    <td align="right" style="width:15%;">'.$row->Pontos.'</td>
    </tr>
    </table>';
    echo '</div> </a>';
    $count = $count + 1;
}
?>
<style>
    div.nome{
        width:800px;
        height:100px;
        border: 1px solid yellow;
        margin: auto;
        color: white;
        margin-bottom:5px;
        color:yellow;
        text-align: center;
        line-height: 100px;
        font-size: 40px
    }
    div.nome:hover{
        animation-name: degrade;
        animation-duration: 0.2s;
        animation-fill-mode: forwards;
    }
    @keyframes degrade{ 
        from {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
        to {box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);}
        from {border: 1px solid yellow;}
        to {border: 2px solid white;}
    }
    div.partdiv{
        width: 400px;
        height: 100px;
        text-align: center;
        color:#CCCC00;
        margin: auto;
        margin-top: 20px;
        margin-bottom:20px;
        border: 1px solid yellow;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    h1.partnum{
        line-height:96px;
    }
    a:hover { 
        text-decoration:none;   
    }    
</style>