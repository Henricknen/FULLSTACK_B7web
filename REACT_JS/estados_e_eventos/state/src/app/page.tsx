"use client"

import { useState } from 'react';

const Page = () => {  
  const [count, setCount] = useState(0);    // declarando a 'variável count' como um estado 'state'

  const handleClickButton = () => {    
    setCount(prevCount => prevCount + 1);     // usando 'setCount' para atualizar o estado
    console.log(count + 1);     // exibindo o valor no console antes da atualização (porém o count real será atualizado na renderização)
  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <p>{count}</p>      {/* contador */}
      <button onClick = {handleClickButton} className = "bg-blue-500 p-3">+1</button>
    </div>
  );

}

export default Page;