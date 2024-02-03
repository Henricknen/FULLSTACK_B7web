## O que é o SASS

O Sass é um pré-processador de CSS que adiciona funcionalidades e melhorias à linguagem, facilitando o desenvolvimento e a manutenção de estilos em projetos web.

## Instalando o SASS via Linha de Comando

Acesse o Repositório do Dart Sass (https://github.com/sass/dart-sass/releases/tag/1.70.0):

Faça o download do arquivo (dart-sass-1.70.0-windows-x64.zip) adequado para a sua máquina.

Descompacte o arquivo ZIP em um diretório de sua escolha.

Adicione o caminho do executável do Sass a variavél PATH do sistema. Isso facilitará o uso do Sass em qualquer diretório no terminal.

## Teste a Instalação:

Abra um terminal e digite o comando (sass --version) para verificar se a instalação foi bem-sucedida.

## Utilizando o SASS no Projeto

Crie pastas espeçificas que conterá os sass (assets/css) coloque o caminho da mesma dentro da tag head abaixo de title no seu arquivo prinçipal (<link rel = "stylesheet" type = "text/css" href = "assets/css/style.css">)

Dentro da pasta assets crie outra chamada de (sass) onde os arquivos serão guardados dentro da mesma crie um arquivo chamado style.scss o qual se tornará css

Para fazer a conversão do arquivo navegue até a pasta do projeto pelo terminal e digite (sass assets/sass/style.scss assets/css/style.css --no-source-map --style compressed), '--no-source-map' gera o arquivo que será interpretado chamado style.css sem o 'style.css.map', --style define o tipo do output

## Assistindo a Alterações (Watch)

Para monitorar alterações ao compilar o Sass (sass assets/sass/style.scss assets/css/style.css --no-source-map --style compressed --watch) o comando --watch não fecha o terminal e qualquer alteração feita em style.scss será passada automaticamente para style.css

Para monitorar todo o diretorio (sass --watch assets/sass:assets/css --no-source-map --style compressed), '--no-source-map --style compressed' é propriedades adiçionais
