"use client"

import { useState } from 'react';

const Page = () => {
  const [count, setCount] = useState(0);      // criação do 'state count'

  const handleBtnClick = () => {    // o state só será alterado quando a função chegar ao fim
    setCount(count + 2);    // após o click do botão será incrementado 2 no state 'count'
  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <p>{count}</p>
      <button onClick = {handleBtnClick} className = "bg-blue-700 text-white p-3 rounded-md">+2</button>    {/* botão chamará a função 'handleBtnClick' que fará o 'incremento' no state */}
    </div>
  );

}

export default Page;