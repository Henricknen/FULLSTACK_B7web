## Organização do projeto    
dentro do seu projeto crie uma pasta chamada 'assets' dentro desta crie outras pastas chamadas 'css', 'js'     
'images'

## Download do Bootstrap

Baixe o arquivo "Compiled CSS and JS" do Bootstrap: https://getbootstrap.com/docs/5.3/getting-started/download/

## Adicionando Arquivos Bootstrap

Ao descompactar o arquivo baixado, você encontrará duas pastas chamadas `css` e `js`. Copie o arquivo `bootstrap.min.css` da pasta `css` e cole na pasta `css` da pasta `assets` do seu projeto.

Em seguida, copie o arquivo `bootstrap.bundle.min.js` da pasta `js` e cole na pasta `js` da pasta `assets` do seu projeto.

## Download do jQuery

Acesse https://jquery.com/download/ e baixe a versão comprimida de produção do jQuery

Copie o arquivo baixado, `jquery-3.7.1.min.js`, e cole na pasta `js` da pasta `assets` do seu projeto

## Inclusão dos Arquivos no HTML

Para inserir o Bootstrap no seu projeto, crie um arquivo `index.html` e cole o seguinte código CSS dentro da tag `<head>`:
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

para o site ter um carregamento mais rapido coloque os arquivos js no final do site antes do 'fechamento' da tag body
dessa forma:
<script type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
Certifique-se de carregar o jQuery primeiro

## Adicionando Arquivos Bootstrap Diretamente da Internet via CDN

Insere o link 'css':
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> 

Insere o link 'js':
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
