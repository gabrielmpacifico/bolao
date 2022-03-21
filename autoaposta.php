<?php
session_start();
include 'conn.php';
include 'menu.html';
include 'verificarlogin.php';
include "adminmenu.php";
?>
<div class="main">
    <div align="center" class="aviso">
        Aqui é possível criar um link para que o participante adicione suas apostas por conta própria<br>
        Lembre-se: Certifique-se de que todas as partidas da competição já estejam adicionadas no sistema<br>
        Selecione o nome do participante e clique em gerar link<br>
        Envie o link gerado para o participante<br>
        A pessoa ao entrar no link deverá preencher suas apostas e clicar em enviar<br>
        Após o envio das apostas o link não funcionará mais e não será possível gerar outro link para o mesmo participante
    </div>
</div>
<?php //Criar nova coluna na tabela de auto_aposta sn_ativo, que permite destaivar um link, colocar aqui uma tabela com os link gerados ?>

<style>
    div.aviso{
        color: yellow;
        font-size: large;
        width: 100%;
    }
</style>