"use client";

import { CustomButton } from "./components/CustomButton";



const Page = () => {

  const handleButton1 = () => alert('clicou no botão 1');   // passando funcões que será executadas 'via prop'
  const handleButton2 = () => alert('clicou no botão 2');
  const handleButton3 = () => alert('clicou no botão 3');

  return (
    <div className="w-screen h-screen flex justify-center items-center">
      <CustomButton label="Clique aqui" onClick = {handleButton1} />    {/* passando as fuções para um componete pessoal que criei */}
      <CustomButton label="Clique aqui 2" onClick = {handleButton2} />
      <CustomButton label="Clique aqui 3" onClick = {handleButton3} />
    </div>
  );
}

export default Page;
