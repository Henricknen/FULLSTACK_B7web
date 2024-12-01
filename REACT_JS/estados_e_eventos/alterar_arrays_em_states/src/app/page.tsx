"use client";

import { TodoItem } from "@/types/TodoItem";
import { useState } from "react";

const Page = () => {
  const [itemInput, setItemInput] = useState('');
  const [list, setList] = useState<TodoItem[]>([
    { label: 'fazendo a exibição', checked: true },
  ]);

  const handleAddButton = () => {
    if (itemInput.trim() === '') return; // Condição que evita adicionar algo em branco
    setList([
      ...list,
      { label: itemInput, checked: false }
    ]);
    setItemInput(''); // Limpa o campo de entrada após adicionar o item
  }

  const deleteItem = (index: number) => {
    setList(list.filter((item, key) => key !== index)); // Cria um novo array sem o item que será deletado
  }

  const toggleItem = (index: number) => {
    let newList = [...list]; // Clonando o array 'list'
    newList[index].checked = !newList[index].checked; // Alterando a propriedade 'checked'
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
        {list.map((item, index) => (
          <li key={index}>
            <input 
              onClick={() => toggleItem(index)} 
              type="checkbox" 
              checked={item.checked} 
              className="w-6 h-6 mr-3" 
            />
            {item.label} - <button onClick={() => deleteItem(index)} className="hover:underline">[ deletar ]</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Page;
