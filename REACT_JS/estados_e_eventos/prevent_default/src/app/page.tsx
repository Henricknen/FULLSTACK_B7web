"use client"

import { FormEvent } from 'react';

const Page = () => {

  const handleFormSubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();   // 'preventDefault' não deixa a ação padrão de envio ser realizada
    alert("Função açionada...");
  }
  
  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center">
      <h1 className = "text-5xl mb-3">Form de login</h1>
      <form onSubmit = {handleFormSubmit}>    {/* criando evento 'onSubmit' que chama a função 'handleFormSubmit' */}
        <input type = "text" />
        <input type = "submit" value = "Enviar" />
      </form>
    </div>
  );
}

export default Page;