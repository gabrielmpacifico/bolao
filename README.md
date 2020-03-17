Site para cadastrar e pontuar os participantes de um bolão, feito de maneira simples onde apenas o criador do bolão precisa fazer login para realizar o cadastro dos participantes e a adição dos resultados da competição. (algumas alterações ainda precisam ser feitas diretamente no banco de dados.)

No arquivo sql.txt, está o código para criação do banco de dados.

É necessário inserir na tabela partidas as linhas referentes a cada partida da competição ao qual o bolão está sendo feito, por exemplo, se a competição tiver 48 partidas será necessário inserir 48 linhas numeradas de 1 a 48 na coluna idpartida e o nome do time mandante e do time visitante nas suas respectivas colunas.

É necessário também adicionar na tabela admin uma linha com um usuario e uma senha(no formato sha1(md5)) que deve ser usado para fazer alterações no banco de dados pelo site, no site clique em regras e depois em login.

No arquivo conn.php deve ser colocado o nome do servidor, o usuário e a senha.

A pontuação do bolão é calculada pelo arquivo attpontos.php, após fazer login e adicionar todos os participantes, sempre que uma partida da competição for finalizada deve-se adicionar o resultado desta partida clicando em <b>adicionar times e placares oficiais -> adicionar/alterar placar</b>, após isso é necessário clicar em atualizar pontos, para que seja feita a alteração no banco de dados de todos os pontos levando em consideração o resultado da partida.
