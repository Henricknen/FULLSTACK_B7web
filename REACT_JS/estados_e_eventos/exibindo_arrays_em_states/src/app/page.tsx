"use client"

import { TodoItem } from "@/types/TodoItem";    // importando type 'TodoItem'
import { useState } from "react";

const Page = () => {
  const [list, setList] = useState<TodoItem[]>([   // state 'list' inicia em branco, mas ela é basicamente um array de 'TodoItem'
    {label: 'Front End', checked: true},    // objeto contém texto 'label' e um 'checked'
    {label: 'Back End', checked: true},
    {label: 'Mobile', checked: false},
  ]);

  return(
    <div className = "w-screen h-screen flex flex-col items-center text-2xl">
      <h1 className = "text-4xl mt-5">Stack</h1>

      <div className = "flex w-full max-w-lg my-3 p-4 rounded-md bg-gray-700 border-2 border-grap">
        <input 
        type="text" 
        placeholder = "Digite sua formação"
        className = "flex-1 border border-black p-3 text-2xl text-black rounded-md mr-3"
        />
        <button>Adicionar</button>
      </div>

      <ul className = "w-full max-w-lg list-disc pt-5">
        {list.map(item => (   // Utilizando 'map' para iterar sobre os itens da lista e exibir cada item com um botão "Deletar"
          <li>{item.label} - <button className = "hover:underline">[Deletar]</button></li>
        ))}
      </ul>
    </div>
  );
}

export default Page;