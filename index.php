<?php include 'menu.html'; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a href="participantes.php"><div class="participantes">PARTICIPANTES</div></a>
            </div>
            <div class="col-sm">
                <a href="partidas.php"><div class="partidas">PARTIDAS</div></a>
            </div>
            <div class="col-sm">
                <a href="pesquisar.php"><div class="pesquisar">PESQUISAR</div></a>
            </div>
            <div class="col-sm">
                <a href="regras.php"><div class="regras">REGRAS E INFO</div></a>
            </div>
            <div class="col-sm">
                <a href="ranking.php"><div class="ranking">RANKING</div></a>
            </div>
        </div>
    </div>
</body>
</html>

<style>
    div.participantes{
        background-image: url(imagens/participantes.png);
    }

    div.partidas{
        background-image: url(imagens/partidas.png);
    }

    div.pesquisar{
        background-image: url(imagens/pesquisar.png);
    }

    div.regras{
        background-image: url(imagens/regras.png);
    }

    div.ranking{
        background-image: url(imagens/ranking.png);
    }
    div.participantes,div.partidas,div.pesquisar,div.regras,div.ranking{
        margin-top: 20px;
        min-width: 250px;
        height: 350px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
        background-position: center;
        background-repeat: no-repeat;      
        background-size: 100%;
        color: #e5e619;
        text-align: center;
        font-size: 40px;
        line-height: 350px;
    }

    div.participantes:hover,div.partidas:hover,div.pesquisar:hover,div.regras:hover,div.ranking:hover{
        animation-name: blurzoom;
        animation-duration: 0.5s;
        animation-fill-mode: forwards;
    }
    @keyframes blurzoom{
        from {filter: blur(0);}
        to {filter: blur(4px);}
        from {background-size: 100%;}
        to {background-size: 120%;}
    }
    a:hover { 
        text-decoration:none;   
    }
</style>