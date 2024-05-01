# teste-estagio-php

<h1>Projeto exibir Aniversariantes</h1>

<h2>Objetivo: criar uma pagina utilizando PHP para exibir no dia atual tem algum colaborador fazendo aniversario de empresa ou de vida.</h2>
<h2>Para rodar o prjeto em um servidor local é necessario baixar as seguintes dependencias:</h2>
<h1>
    <a href="https://www.apachefriends.org/download.html">🔗 XAMPP</a>
    <a href="https://getcomposer.org/download/">🔗 Composer</a>
</h1>
## O XAMPP precisa estar na versão: 8.2.12 / PHP 8.2.12.
## Baixar o executável do composer para o Windows.
## Na pasta desafio-aniversariantes tem um tuorial detalhado "docinstalacaoServidor.pdf" sobre a instalação e configuração do ambiente com imagens.
<h2>Como foi implementado o codigo:</h2>
<p>
  1. Carregamento do Arquivo e Chamada das Funções:
   - O arquivo Excel é carregado usando a função lerArquivo.
   - Os dados são passados para a função verificaAniversario.
   - Os resultados são armazenados na variável $resultados.

2. Requisição do Autoload:
   - O código requer o arquivo de autoload da biblioteca PhpSpreadsheet para carregar as classes necessárias.

3. Função lerArquivo:
   - Esta função recebe o caminho de um arquivo Excel.
   - Utiliza a biblioteca PhpSpreadsheet para carregar e ler os dados do arquivo.
   - Os dados são convertidos em um array multidimensional (Matriz).

4. Função verificaAniversario:
   - Esta função recebe um array de dados dos colaboradores.
   - Primeiro verifica se o colaborador está com data de desligamento, se estiver não entra na condição de aniversariantes
   - Para cada colaborador, verifica se é o aniversário dele hoje ou se ele está fazendo aniversário na empresa hoje.
   - Se a condição for verdadeira, uma mensagem é adicionada ao array de resultados.

5. Saída HTML:
   - Os resultados da verificação de aniversários são exibidos dentro de uma div na página HTML.
</p>

<h1>Implementação Jogo Túnel</h1>
<h2>
    1. Entrada e Saída:
   - O código solicita ao usuário as dimensões da matriz e os valores da matriz.
   - Depois que a matriz é inserida, o código procura pela posição inicial do objeto "X".
   - Se a posição inicial for encontrada, o caminho é verificado e as instruções são exibidas.

2. Função jogoTunel:
   - Um loop while é usado para permitir que o jogador insira múltiplas matrizes para verificar o caminho.
   - O jogador é solicitado a inserir as dimensões da matriz e, em seguida, inserir os valores da matriz.
   - A função busca a posição inicial do objeto "X" na matriz e, se encontrada, chama a função verificaCaminho.
   - Antes de chamar a função verificaCaminho, é inicializada a matriz $caminho essa variavel é passada por referência para que as alterações feitas dentro da função sejam refletidas fora da função.

3. Função verificaCaminho:
   - Esta função recebe uma matriz, uma posição inicial, as dimensões da matriz e uma matriz $caminho por referência.
   - Ela é responsável por verificar o caminho na matriz, marcando as posições visitadas no $caminho para evitar loop.
   - A função é recursiva por questões de otimização do código, ou seja, ela chama a si mesma para continuar verificando o caminho.
   - Dentro da função é verificado três direções possíveis.Se uma direção válida for encontrada, a função é chamada recursivamente para continuar verificando o caminho nessa direção.
</h2>
