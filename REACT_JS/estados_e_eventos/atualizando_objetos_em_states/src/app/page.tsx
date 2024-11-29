"use client"

import { Person } from '@/types/Person';
import { useState } from 'react';

const Page = () => {
  const [fullName, setFullName] = useState<Person>({name: 'Luis', lastName: 'Henrique'});     {/* utilizando um objeto com 'name' e 'lastName' dentro do 'state' fullName */}

  const handleLimpar = () => {      // função limpa o valores dos input
    setFullName({name: '', lastName: ''});    // atribuindo valores vazios '' para as propriedades 'name' e 'lastName'
  }

  const handleLimparNome = () => {      // função limpa o nome
    setFullName({...fullName, name: ''});     // para alterar só o name, primeio o clona e depois atribui um valor a ele, que nesse caso o valor é vazio ''
  }

  const handleLimparSobrenome = () => {   // função limpa apenas o sobrenome
    setFullName({...fullName, lastName: ''});
  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <input 
      type="text"
      placeholder = "Nome"
      className = "border border-black p-3 text-2xl text-black roundend-md md-3"
      value = {fullName.name}     // value mostra no campo do input o valor atual da propriedade 'name' do objeto  do state fullName
      onChange = {e => setFullName({...fullName, name: e.target.value})}    // utilizando 'setFullName' para fazer atualização na propriedade 'name' do objeto clonado '...fullName'
      />
      
      <input 
      type="text"
      placeholder = "Sobrenome"
      className = "border border-black p-3 text-2xl text-black roundend-md md-3"
      value = {fullName.lastName}
      onChange = {e => setFullName({...fullName, lastName: e.target.value})}
      />

      <p>Me chamo:</p>
      <p>{fullName.name} {fullName.lastName}</p>    {/* exibe o nome e sobrenome que forem digitados no input */}
      <p>-----------------------------------------------</p>

      <button onClick = {handleLimpar}>Limpar Tudo</button>
      <button onClick = {handleLimparNome}>Limpar Nome</button>
      <button onClick = {handleLimparSobrenome}>Limpar Sobrenome</button>
    </div>
  );

}

export default Page;