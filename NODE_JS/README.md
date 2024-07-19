### Para executar projetos node, entrar na pasta do projeto pelo terminal e digita o seguinte comando:
node ./nome_do_arquivo.js

### Para criar o arquivo package.json de configuração espeçifica para npm dentro da pasta do projeto digitar o seguinte comando:
npm init

### Para executar os comandos de script ultilizar:
npm run "nome do comando dejesado"

### Instalando a biblioteca 'typescript' nas depêndençias de desenvolvimento, utilize npm install -D "nome da biblioteca":
npm install -D typescript

### Instalando a biblioteca de forma global:
npm install -g tyescript

### compilando arquivos typescript 'ts':
npx tsc index.ts

###  criando arquivo de configuração 'tsconfig.js':
npx  tsc --init

### executado com biblioteca ts-node instalada:
npx ts-node index.ts

### para habilitar o modo WATCH utilize:
node --watch src/nome_do_arquivo

### para adiçionar um suporte para rodar arquivos typescript tem que instalar uma biblioteca chamada 'tsx':
node --import tsx --watch src/nome_do_arquivo.ts

### para encerrar a execução do watch digite:
ctrl + c