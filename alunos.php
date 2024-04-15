<?php

  /*
  * Este exemplo mostra como ler o conteúdo de um arquivo e exbir em uma página Web
  * Este exemplo utiliza os conteitos de manusear arquivos e passagem de parâmetros por URL
  */

  /*
  * Funções PHP
  * scandir(string) - Faz uma varredura no diretório indicado e retorna uma
  *      Array com os nomes dos arquivos encontrados. 
  * fopen(nome, modo_de_abertura) - retorna uma chamada (ponteiro) para um
  *      handle de arquivos podemos utilizar o handle para ler ou escrever
  *      em um arquivo.
  * fread(nome, tamanho_em_bytes) - Faz uma leitura em um arquivo e retorna
  *      uma String com todo o conteúdo do arquivo concatenado.
  * file_get_contents(nome) - mesma coisa que o fread.
  * strpos($string, $string_a_localizar) - Faz uma verificação em uma string
  *      bem busca de uma chave passada. Retorna a posição onde foi encontrada
  *      ou FALSE
  */

  // Variáveis utilizadas
  $DIRETORIO = '.';
  $EXTENSAO = '.txt';

  // Scaneia os arquivos do diretório passado.
  // Retorna um array com o nome dos arquivos
  $arquivos = scandir($DIRETORIO);

  // Veirifica se o parâmetro abrir= foi passado na URL
  if (isset($_GET['abrir'])) {
    // Guardamos o nome (string) do arquivo em uma variável
    $nome_do_arquivo = $_GET['abrir'];
    $arquivo = fopen($nome_do_arquivo, 'r');

    if (isset($arquivo) && $arquivo) {
      /*
      * Temos ao menos duas formas faceis para ler o conteúdo de um arquivo
      * fread e file_get_contents retorna todo o conteúdo de um arquivo
      * concatenado em uma única STRING
      */
      // $conteudo = fread($arquivo, filesize($nome_do_arquivo));
      $conteudo = file_get_contents($nome_do_arquivo);
      fclose($arquivo);
    }
  }
  ?>
?>