<?php
session_start();
include 'conn.php';
include 'menu.html';
include 'verificarlogin.php';
include "adminmenu.php";
?>

<div class="main">
    <div class="timeouplacar">
        <table align="center">
            <tr>
                <td class="menu" align="center" onclick="alterartime()">Adicionar/Alterar Time</td>
                <td class="menu" align="center" onclick="alterarplacar()">Adicionar/Alterar Placar</td>
            </tr>
        </table>
    </div>

    <div id="alterartime" style="display: none">
        <form action="alterofitime.php" method="POST">
            <table align="center">
                <tr>
                    <td align="center">Digite o número da partida</td>
                    <td align="center">Digite o time mandante</td>
                    <td align="center">Digite o time visitante</td>
                </tr>
                <tr>
                    <td align="center">
                    <input type="text" style="width: 20%; height:100%" name="idpartida">
                    </td>
                    <td align="center"><input style="width: 90%" type="text" name="timemandante"></td>
                    <td align="center"><input style="width: 90%" type="text" name="timevisitante"></td>
                </tr>
            </table>
            <table align="center">
                <tr><td align="center"><input class="enviar" style="width: 90%" type="submit"></td></tr>
            </table>
        </form>

        <table align="center">
        <?php
            $counter = 3;
            $sql = "SELECT idpartida,timemandante,timevisitante FROM bolao.partida;";
            $stmt2 = $conn->prepare($sql);$stmt2->execute();
            while($row2 = $stmt2->fetch(PDO::FETCH_OBJ)){
                if($counter == 3){echo '<tr>';}elseif($counter == 0){$counter = 3;}
                echo '<td>';
                echo $row2->idpartida.' - '.$row2->timemandante.' X '.$row2->timevisitante.'<br>';
                echo '</td>';
                if($counter == 1){echo '</tr>';}
                $counter = $counter - 1;
            }
        ?>
        </table>

    </div>

    <div id="alterarplacar" style="display: none">
    <form action="alterofiplacar.php" method="POST">
        <table align="center">
            <tr>
                <td align="center">Selecione a partida que será alterada</td>
                <td align="center">Digite o novo placar</td>
                <td align="center">Envie a mudança</td>
            </tr>
            <tr>
                <td align="center">
                <select style="width: 90%; height:100%" id="nome" name="idpartida">
                    <?php 
                    $sql = "SELECT idpartida,timemandante,timevisitante FROM bolao.partida;";
                    $stmt = $conn->prepare($sql);$stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo '<option value="'.$row->idpartida.'">'.$row->timemandante.' X '.$row->timevisitante.'</option>';
                    }
                    ?>
                </select>
                </td>
                <td align="center"><input style="width: 20%" type="text" name="novomandante"> X <input style="width: 20%" type="text" name="novovisitante"></td>  
                <td align="center"><input class="enviar" style="width: 90%" type="submit"></td>
            </tr>
        </table>
    </form>
    </div>
</div>

<script type="text/javascript">
    function alterartime(){
        document.getElementById("alterarplacar").style.display = "none";
        document.getElementById("alterartime").style.display = "block";
    
    }
    function alterarplacar(){
        document.getElementById("alterartime").style.display = "none";
        document.getElementById("alterarplacar").style.display = "block";
    }
</script>

<style>
    table{
        margin-top: 20px;
        border: 2px solid yellow;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    div.timeouplacar{
        margin-left: auto;
        color: yellow;
        font-size: 30px;
    }
    td{
        background-color: green;
        width: 300px;
        height: 30px;
        color: yellow;
    }
    td.menu:hover{
        background-color: #006400;
    }
    table td + td { 
        border-left:6px solid yellow; 
    }
    input.enviar{
        border-radius: 10px;
        background-color: yellow;
    }
</style>