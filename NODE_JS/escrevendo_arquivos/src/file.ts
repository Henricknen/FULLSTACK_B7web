import { writeFile } from 'fs/promises';

const exec = async () => {
    console.log('Escrevendo no arquivo...');

    const list = ['PHP', 'LARAVEL', 'JAVACRIPT', 'VUE.JS', 'NODE.JS', 'SQL', 'HTML', 'CSS', 'GIT'];
    const listText = list.join('\n');       // juntando o array de hardskills e '\n' faz a quebra de linha inserindo cada uma em uma linha diferente
    try {
        await writeFile('./teste.txt', listText);     // função 'writeFile' permite escrever em um arquivo, utilza dois parâmetros o primeiro é arquivo onde será escrito e segundo é o que será escrito
        console.log('Terminou a descrição...');
    } catch (error) {
        console.error('Erro ao escrever no arquivo:', error);
    }
}

exec();
