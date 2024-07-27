import { readFile, writeFile } from 'fs/promises';

const exec = async () => {
    try {
        const fileContent = await readFile('./teste.txt', { encoding: 'utf8' });                // lendo o arquivo
        console.log('Conteúdo do arquivo antes da alteração:', fileContent);

        const list = fileContent.split('\n');               // transformando o arquivo em um array
        list.push('FullStack');     // adicionando um item ao array

        console.log('Conteúdo do array após a alteração:', list);

        const listTxt = list.join('\n');        // salvando o novo conteúdo de volta no arquivo
        await writeFile('./teste.txt', listTxt);

        const updatedFileContent = await readFile('./teste.txt', { encoding: 'utf8' });        // confirmando a escrita lendo novamente o arquivo
        console.log('Novo conteúdo do arquivo:', updatedFileContent);
    } catch (error) {
        console.error('Erro ao ler ou escrever no arquivo:', error);
    }
}

exec();
