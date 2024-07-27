import { readFile, unlink, writeFile } from 'fs/promises';

const exec = async () => {
    try {
        await unlink('./teste.txt');        // 'excluindo' o arquivo teste.txt
        console.log('Arquivo teste.txt excluído com sucesso.');
    } catch (error) {
        console.error('Erro ao excluir o arquivo:', error);
    }
}

exec();
