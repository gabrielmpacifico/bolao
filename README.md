Site para cadastrar e pontuar os participantes de um bolão, feito de maneira simples onde apenas o criador do bolão precisa fazer login para realizar o cadastro dos participantes e a adição dos resultados da competição. (algumas alterações ainda precisam ser feitas diretamente no banco de dados.)

No arquivo sql.txt, está o código para criação do banco de dados.

É necessário adicionar na tabela admin uma linha com um usuario e uma senha que deve ser usado para fazer alterações no banco de dados pelo site, no site clique em regras e depois em login (a senha deve estar no formato SHA1, podendo ser criptografada no site http://www.sha1-online.com/).

No arquivo conn.php deve ser colocado o nome do servidor, o usuário e a senha.

A pontuação do bolão é calculada pelo arquivo attpontos.php, após fazer login e adicionar todos os participantes, sempre que uma partida da competição for finalizada deve-se adicionar o resultado desta partida clicando em <b>adicionar times e placares oficiais -> adicionar/alterar placar</b>, após isso é necessário clicar em atualizar pontos, para que seja feita a alteração no banco de dados de todos os pontos levando em consideração o resultado da partida.

Próxima atualização:
1.Retirar apostas exatas da tela de partidas e colocar o botão, Estatisticas das apostas nesta partida.
  Na tela de estatisticas de partida, colocar quantos pontos essa partida gerou no total para os apostadores e quantos apostadores acertaram o placar exato com o nome de cada apostador

2.colocar um LIKE na consulta do pesquisar.php, para trazer a lista de participantes de acordo com o nome pesquisado, caso não encontre um participante com o nome exato pesquisado

3.Opção de apagar, times, partidas, e apostadores.
  Manter uma tela somente para as exclusões e fazer e perguntar se tem certeza da exclusão, exibindo uma soma que deve ser respondida corretamente para que o processo seja concluido.

BUGS VISUAIS: 
Nome do participante se muito grande passa da DIV.
Tela de adicionar/alterar time com bug na visualização da linha entre as colunas da tabela com os times já adicionados