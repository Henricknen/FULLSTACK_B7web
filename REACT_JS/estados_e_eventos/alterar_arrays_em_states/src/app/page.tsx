"use client";

import { TodoItem } from "@/types/TodoItem";
import { useState } from "react";

const Page = () => {
  const [itemInput, setItemInput] = useState('');
  const [list, setList] = useState<TodoItem[]>([
    { label: 'fazendo a exibição', checked: true },
  ]);

  const handleAddButton = () => {
    if (itemInput.trim() === '') return;      // condição que evitar adiçionar algo em branco, se 'itemInput' estiver vazio encerra a execução do código
    setList([
      ...list,
      { label: itemInput, checked: false }
    ]);
    setItemInput('');
  }

  const deleteItem = (index: number) => {    // função 'deleteItem' fará a deleção do item
    setList(
      list.filter((item, key) => key !== index)     // 'filter' cria um novo array sem o item que será deletado
      );
  }

  const toggleItem = (index: number) => {
    let newList = [...list];
        newList[index]. checked = !newList [index].checked;
    }

    setList(newList);
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
            <input onClick = (( => toggleItem)) type = "checkbox" checked = {item.checked} className = "w-6 h-6 mr-3" />
            {item.label} - <button onClick = {() => deleteItem(index)} className="hover:underline">[ deletar ]</button>     {/* utilizanado evento 'onClick' para executar a função 'deleteItem' */}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Page;