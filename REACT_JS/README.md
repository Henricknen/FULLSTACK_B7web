### Criação de projeto React via CDN

criar projeto via CDN é praticamente importar bibliotecas em código html, utilizando link direto para o arquivo da tal biblioteca:
insira o link que importa biblioteca do 'react' em baixo da tag title:
```bash
<script src = "https://unpkg.com/react@18/umd/react.development.js"></script>
```

insira o link para importação do 'react-dom' logo após do link anterior:
```bash
<script src = "https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
```
em seguida insira o link da ferramenta 'babel' que compila o código react em um código final quando o mesmo for para ar:
```bash
<script src = "https://unpkg.com/@babel/standalone/babel.min.js"></script>
```

### Criação de projeto React utilizando framework Next

atualize o next com o comando abaixo pelo prompt de comando:
```bash
npm install -g create-next-app
```
para 'criar' o projeto dentro da pasta pelo prompt d comando onde se quer criar o projeto digitar o seguinte comando:
```bash
npx create-next-app
```

após dar esse comando será necessário inserir o nome do projeto e responder algumas perguntas como:
- Would you like to use Typescript with this project?
- Would you like to use ESLint with this project?
- Would you like to use Tailwind CSS with this project?
- Would you like to use 'src/' directory with this project?
- Use App Router (recomended)?
- Would you like to customize the default import alias?

para rodar o projeto criado entre na pasta do projeto pelo terminal e digite:
```bash
npm run dev
```

### Criação do projeto puro sem nenhum framework a biblioteca do 'Vitae'

dentro da pasta do projeto pelo prompt de comando digitar:
```bash
npm create vite
```
após a criação é necessário instalar algumas depêndeçias, então digite o comando dentro da pasta do projeto criado:
```bash`
npm install
```para rodar o projeto criado entre na pasta do projeto pelo terminal e digite:
```bash
npm run dev
```
