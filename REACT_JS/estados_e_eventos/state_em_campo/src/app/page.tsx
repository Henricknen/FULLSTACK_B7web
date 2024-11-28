"use client"

import { useState } from 'react';

const Page = () => {  
  const [nameInput, setNameInput] = useState('');   // state iniciando vazio, 'nameInput' sempre será atualizado com o nome que está no campo
  const  handleBtnClick = () => {
    alert(nameInput);
  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <input    // campo para digitação do nome
         type="text"
         className = "border border-black p-3 text-xl text-black rounded" 
         placeholder = "Digite seu nome"
         value = {nameInput}    // associação direta entre o 'value' e o 'state'
         onChange = {e => setNameInput(e.target.value)}   // utilizando evento 'onChange' para peguar o valor do input
         />

        <p>Seu nome é: {nameInput}</p>
        <button onClick={handleBtnClick}>Mostrar valor do campo</button>
    </div>
  );

}

export default Page;