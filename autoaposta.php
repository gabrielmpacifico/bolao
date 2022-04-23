<?php
session_start();
include 'conn.php';
include 'menu.html';
include 'verificarlogin.php';
include "adminmenu.php";
?>
<div class="main">
    <div align="center" class="aviso">
        Aqui é possível criar um link para que o participante adicione suas apostas por conta própria.<br>
        Lembre-se: Certifique-se de que todas as partidas da competição já estejam adicionadas no sistema.<br>
        1.) Selecione o nome do participante e clique em gerar link.<br>
        2.) Envie o link gerado para o participante.<br>
        3.) A pessoa ao entrar no link deverá preencher suas apostas e clicar em enviar.<br>
        4.) Após o envio das apostas o link não funcionará mais e não será possível gerar outro link para o mesmo participante.<br>
        (A coluna Ativo indica se o código do usuario está ativo (S) ou não (N) para ser utilizado<br>
        um código se torna inativo (N) após o usuário enviar suas apostas)    
    </div>

    <div id="alterarnome">
        <form action="autoapostaform.php" method="POST">
            <table align="center">
                <tr>
                    <td align="center">Selecione o participante <br> que receberá o link</td>
                    <td align="center">Gerar link</td>
                </tr>
                <tr>
                    <td align="center">
                        <select style="width: 90%; height:100%" id="nome" name="idusuario">
                            <?php 
                            $sql = "SELECT idusers,nome FROM bolao.users WHERE idusers NOT IN (SELECT idusers FROM bolao.auto_aposta);";
                            $stmt = $conn->prepare($sql);$stmt->execute();
                            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo '<option value="'.$row->idusers.'">'.$row->nome.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td align="center"><input class="enviar" style="width: 90%" type="submit"></td>
                </tr>
            </table>
        </form>
    </div>

    <table align="center">
    <tr> 
        <td align="center">Nome do participante <br> <hr> </td> 
        <td align="center">Código para fazer a auto aposta <br> <hr> </td>
        <td align="center">Código ativo <br> <hr> </td> 
    </tr>

        <?php
            $sql = "SELECT u.nome,aa.hash,aa.sn_ativo FROM bolao.auto_aposta aa, bolao.users u WHERE u.idusers = aa.idusers;";
            $stmt = $conn->prepare($sql);$stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                echo '<tr> <td align="center">'.$row->nome.'</td> <td align="center">'.$row->hash.'</td> <td align="center">'.$row->sn_ativo.'</td> </tr>';
            }
        ?>
    </table>


</div>
<?php //Criar nova coluna na tabela de auto_aposta sn_ativo, que permite destaivar um link, colocar aqui uma tabela com os link gerados ?>

<style>
    div.aviso{
        color: yellow;
        font-size: large;
        width: 100%;
    }
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
        background-color: yellow;
    }
</style>