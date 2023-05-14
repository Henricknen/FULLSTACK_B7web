?php
$texto = file_get_contents('texto.txt');        // função 'file_get_contents' faz leitura de arquivos externos
$textoo = explode("\n", $texto);       // quebra o texto por linha

echo $texto;
echo " <br>Linhas: ". count($textoo);