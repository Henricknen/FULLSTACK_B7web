"use client"

import { useState } from "react";   {/* importando o 'hook' do react */}

const Page = () => {
    const [count, setCount ] = useState(0);     {/* constante 'count' criada com o 'hook' do state */}

    const handleClickButton = () => {
      setCount(count + 1);    // 'incrementando' count que será enviado renderizado para a função 'setCount'
    }

    return (
        <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
            <p>{count}</p>
            <button onClick = {handleClickButton} className = "bg-blue-500 p-3">+1</button>
        </div>
    );
}

export default Page;