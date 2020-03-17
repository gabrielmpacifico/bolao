<?php
session_start();
include 'conn.php';
include 'menu.html';
include 'verificarlogin.php';
include "adminmenu.php";
?>
<div class="main">
    <div class="nomeouaposta">
        <table align="center">
            <tr>
                <td class="menu" align="center" onclick="alterarnome()">Alterar Nome</td>
                <td class="menu" align="center" onclick="alteraraposta()">Alterar Aposta</td>
            </tr>
        </table>
    </div>

    <div id="alterarnome" style="display: none">
    <form action="alterpartnome.php" method="POST">
        <table align="center">
            <tr>
                <td align="center">Selecione o nome que deseja mudar</td>
                <td align="center">Digite o novo nome</td>
                <td align="center">Envie a mudança</td>
            </tr>
            <tr>
                <td align="center">
                <select style="width: 90%; height:100%" id="nome" name="idusuario">
                    <?php 
                    $sql = "SELECT idusers,nome FROM bolao.users;";
                    $stmt = $conn->prepare($sql);$stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo '<option value="'.$row->idusers.'">'.$row->nome.'</option>';
                    }
                    ?>
                </select>
                </td>
                <td align="center"><input style="width: 90%" type="text" name="novonome" placeholder="Novo Nome"td>
                <td align="center"><input class="enviar" style="width: 90%" type="submit"></td>
            </tr>
        </table>
    </form>
    </div>

    <div id="alteraraposta" style="display: none">
    <form action="alterpartaposta.php" method="POST">
        <table align="center">
            <tr>
                <td align="center">Selecione o nome do participante</td>
                <td align="center">Selecione a partida que será alterada</td>
                <td align="center">Digite o novo placar</td>
            </tr>
            <tr>
                <td align="center">
                <select style="width: 90%; height:100%" id="nome" name="idusuario">
                    <?php 
                    $sql = "SELECT idusers,nome FROM bolao.users;";
                    $stmt = $conn->prepare($sql);$stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                        echo '<option value="'.$row->idusers.'">'.$row->nome.'</option>';
                    }
                    ?>
                </select>
                </td>
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
            </tr>
        </table>
        <table align="center">
            <tr> 
                <td align="center"><input class="enviar" style="width: 90%" type="submit"></td>
            </tr>
        </table>
    </form>
    </div>
</div>

<script type="text/javascript">
    function alterarnome(){
        document.getElementById("alteraraposta").style.display = "none";
        document.getElementById("alterarnome").style.display = "block";
    
    }
    function alteraraposta(){
        document.getElementById("alterarnome").style.display = "none";
        document.getElementById("alteraraposta").style.display = "block";
    }
</script>

<style>
    table{
        margin-top: 20px;
        border: 2px solid yellow;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    div.nomeouaposta{
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