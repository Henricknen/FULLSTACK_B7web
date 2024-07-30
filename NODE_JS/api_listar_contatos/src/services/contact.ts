import { writeFile } from "fs/promises";
import { readFile } from "fs/promises";
const dataSource = './data/list.txt';       // variável de 'fonte dos dados'

export const getContacts = async () => {        // criando e exportando função 'getContacts'
    let list: string[] = [];        // variável 'list' armazenando um array de string
    try {
        const data = await readFile(dataSource, {encoding: 'utf8'});       // lendo o conteúdo do arquivo 'list.txt' que armazena os nomes
        list = data.split('\n');        // o array será criado com um item em cada linha
    } catch(err) {

    }

    return list;
}

export const createContact = async (name: string) => {
    let list = await getContacts();     // pegando a lista de contatos
    
    list.push(name);        // inserindo um novo nome
    await writeFile(dataSource, list. join('\n'));
}

export const deleteContact = async (name: string) => {
    let list = await getContacts();

    list = list.filter(item=> item.toLowerCase() !== name. toLowerCase());     // filtrando a lista para exclusão

    await writeFile(dataSource, list.join('\n'));     // escrevendo a lista depois das exclusões

}