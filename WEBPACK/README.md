## O que é o WEBPACK

O Webpack é uma ferramenta de código aberto utilizada para empacotar e transformar recursos da web, como JavaScript, imagens, CSS e muitos outros, em um ou mais bundles otimizados que podem ser carregados em um navegador da web. Ele é amplamente utilizado no desenvolvimento de aplicações web modernas e fornece várias funcionalidades poderosas

## Instalação do webpack

Crie uma pasta para o seu projeto e navegue até ela no terminal.

Inicie o projeto npm executando o seguinte comando e seguindo as instruções para preencher as configurações iniciais:

(npm init
)
Isso criará um arquivo chamado package.json com as configurações iniciais do seu projeto.

Instale o webpack e o webpack-cli executando o seguinte comando:

(npm install webpack webpack-cli --save-dev)

O parâmetro --save-dev salva o webpack como uma dependência de desenvolvimento. Isso significa que o webpack não será incluído no pacote distribuível quando você publicar seu projeto.

## Utilizando o projeto

Dentro do seu projeto, você pode instalar a biblioteca jQuery executando o seguinte comando:

(npm install jquery)

## Executando o Webpack

Para executar o webpack e empacotar seus arquivos JavaScript, execute o seguinte comando:

(npx webpack)

Você precisará executar este comando sempre que fizer alterações no seu código JavaScript e quiser reempacotá-lo. O webpack detectará automaticamente as alterações e gerará os novos pacotes conforme necessário.

## Excutando arquivo de configuração

Para executar o arquivo de configuração digite no terminal

(npx webpack --config webpack.config.js)

Essa instrução solicita ao Webpack para usar o arquivo webpack.config.js como arquivo de configuração ao executar o empacotamento dos seus recursos.

Também é possível ultilizar um atalho para fazer a configutação só ultilizar o comando

(npm run build)

## Carregando css no projeto

Primeiro se instala as bibliotecas style-loader e a css-loader com o seguinte comando

(npm install style-loader css-loader --save-dev)

E inserindo (--save-dev) salva as bibliotecas como dependências de desenvolvimento no arquivo package.json

Atualizar o projeto ultilize o seguinte comando

(npm run build)  