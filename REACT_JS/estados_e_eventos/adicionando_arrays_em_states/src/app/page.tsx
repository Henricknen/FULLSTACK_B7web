"use client"

import { TodoItem } from "@/types/TodoItem";
import { useState } from "react";

const Page = () => {
  const [itemInput, setItemInput] = useState('');   // state itemInput inçiando vazio
  const [list, setList] = useState<TodoItem[]>([
    {label: 'Front End', checked: true},
    {label: 'Back End', checked: true},
    {label: 'Mobile', checked: false},
  ]);

  const handleAddButton = () => {
    setList([   // cria um 'novo' array
      ...list,    // clona o array existente
      { label: itemInput, checked: false}   // adiçiona um novo item

    ]);

    setItemInput('');   // após a adição do item na lista 'limpa' o input para inserir novos itens
  }

  return(
    <div className = "w-screen h-screen flex flex-col items-center text-2xl">
      <h1 className = "text-4xl mt-5">Stack</h1>

      <div className = "flex w-full max-w-lg my-3 p-4 rounded-md bg-gray-700 border-2 border-grap">
        <input 
        type="text" 
        placeholder = "Digite sua formação"
        className = "flex-1 border border-black p-3 text-2xl text-black rounded-md mr-3"
        value = {itemInput}
        onChange = {e => setItemInput(e.target.value)}    // faz a alteração em 'itemInput'
        />
        <button onClick = {handleAddButton}>Adicionar</button>    {/* botão cham a função 'handleAddButton' responsável por 'adicionar' itens no array do state */}

      </div>

      <p className = "my-4">{list.length} itens da lista</p>    {/* mostra a 'quantidades' de itens da lista */}

      <ul className = "w-full max-w-lg list-disc pt-5">
        {list.map(item => (
          <li>{item.label} - <button className = "hover:underline">[Deletar]</button></li>
        ))}
      </ul>
    </div>
  );
}

export default Page;