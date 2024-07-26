import { readFile, writeFile } from 'fs/promises';

const exec = async () => {
    try {
    const fileContent = await readFile('./teste.txt', {encoding: 'utf8'});        // utilizando função 'readFile' para ler arquivos reçebendo como parâmetro o arquivo que será lido e um objeto chamado 'encoding' que é um padrão para leitura de texto
    console.log(fileContent)

    const list = fileContent.split("\n");       // transformando o conteúdo que já foi lido em um array, que colocará os nomes em cada linha
    console.log(list);

    } catch (error) {
        console.error('Erro ao ler o arquivo:', error);     // Adiciona tratamento de erros
    }
}

exec();
