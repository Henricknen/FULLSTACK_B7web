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
