"use client";

import { TodoItem } from "@/types/TodoItem";
import { useState } from "react";

const Page = () => {
  const [itemInput, setItemInput] = useState('');
  const [list, setList] = useState<TodoItem[]>([
    { id:1, label: 'ultilizando ID', checked: true },
  ]);

  // const handleAddButton = () => {
  //   if (itemInput.trim() === '') return;
  //   setList([
  //     ...list,
  //     { id:length + 1,    // utilizando 'id' para pegar a quantidade de itens que tem na lista
  //       label: itemInput, checked: false }
  //   ]);
  //   setItemInput('');
  // }

  const handleAddButton = () => {
    if (itemInput.trim() === '') return;
    setList([
      ...list,
      { id: list.length + 1,    // Usa o comprimento da lista para gerar id único
        label: itemInput, 
        checked: false 
      } 
    ]);
    setItemInput('');
  }

  const deleteItem = (id: number) => {
    setList(list.filter(item => item.id !== id));     // utilizando 'filter' para excluir pelo 'id'
  }

  const toggleItem = (id: number) => {    // pegando o 'id'
    let newList = [...list];    // criando um 'novo' array

    for(let i in newList) {   // loop na nova lista
      if(newList[i].id === id) {      // identificação do 'id' que será feita a alteração
        newList[i].checked = !newList[i].checked;   // alterando o 'checked'
      }
    }

    setList(newList); // Atualizando o estado com a nova lista
  }

  return (
    <div className="w-screen h-screen flex flex-col justify-center items-center text-2xl">
      <h1 className="text-4xl mt-5">Lista de Tarefas...</h1>

      <div className="flex w-full max-w-lg my-3 p-4 rounded-md bg-gray-700 border-2 border-gray">
        <input
          type="text"
          placeholder="Digite uma tarefa"
          className="flex-1 border-black p-3 text-2xl text-black rounded-md mr-3"
          value={itemInput}
          onChange={e => setItemInput(e.target.value)}
        />

        <button onClick={handleAddButton} className="text-white">Adicionar</button>
      </div>

      <p className="my-4">{list.length} itens da lista</p>

      <ul className="w-full max-w-lg list-disc pt-5">
        {list.map((item) => (
          <li key={item.id}>
            <input 
              onChange = {() => toggleItem(item.id)} 
              type="checkbox" 
              checked={item.checked} 
              className="w-6 h-6 mr-3" 
            />
            {item.label} - <button onClick={() => deleteItem(item.id)} className="hover:underline">[ deletar ]</button>     {/* deletando o item com base no 'id' */}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Page;
