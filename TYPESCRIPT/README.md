# Instalação global do TypeScript (se necessário)
npm install -g typescript

# Verifica a versão instalada
tsc --version

# Compila o arquivo script.ts na pasta atual
tsc script.ts

# Compila o arquivo script.ts que está dentro da pasta 'src/'
tsc src/script.ts

# Compila o arquivo script.ts na pasta 'src/' sem emitir arquivos em caso de erro
tsc src/script.ts --noEmitOnError
