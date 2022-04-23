Site para cadastrar e pontuar os participantes de um bolão, feito de maneira simples onde apenas o criador do bolão precisa fazer login para realizar o cadastro dos participantes e a adição dos resultados da competição. (algumas alterações ainda precisam ser feitas diretamente no banco de dados.)

No arquivo sql.txt, está o código para criação do banco de dados.

É necessário adicionar na tabela admin uma linha com um usuario e uma senha que deve ser usado para fazer alterações no banco de dados pelo site, no site clique em regras e depois em login (a senha deve estar no formato SHA1, podendo ser criptografada no site http://www.sha1-online.com/).

No arquivo conn.php deve ser colocado o nome do servidor, o usuário e a senha.

A pontuação do bolão é calculada pelo arquivo attpontos.php, após fazer login e adicionar todos os participantes, sempre que uma partida da competição for finalizada deve-se adicionar o resultado desta partida clicando em <b>adicionar times e placares oficiais -> adicionar/alterar placar</b>, após isso é necessário clicar em atualizar pontos, para que seja feita a alteração no banco de dados de todos os pontos levando em consideração o resultado da partida.

Próxima atualização:
1.Retirar apostas exatas da tela de partidas e colocar o botão, Estatisticas das apostas nesta partida.
  Na tela de estatisticas de partida, colocar quantos pontos essa partida gerou no total para os apostadores e quantos apostadores acertaram o placar exato com o nome de cada apostador
  (Ou criar tela única com estatisticas no geral)
  (Top-5 partidas que geraram pontos / Top-5 partidas que menos geraram pontos)
  (Top-5 apostadores com mais placares exatos)

3.Opção de apagar apostadores.
  fazer e perguntar se tem certeza da exclusão, exibindo uma soma que deve ser respondida corretamente para que o processo seja concluido.

4.Criar menu novo para adicionar apenas o nome do participante, sem apostas (avisar que esse metodo é para    utilizar o auto apostas para o próprio participante adicionar as suas apostas)
alterar no banco a tabela de apostas para permitir valor null no mandante e visitante

5.Novas telas, AUTO APOSTA dentro da sessão de REGRAS E INFO e ESTATISTICAS no MENU PRINCIPAL (index)


BUGS VISUAIS: 
Tela de adicionar/alterar time com bug na visualização da linha entre as colunas da tabela com os times já adicionados