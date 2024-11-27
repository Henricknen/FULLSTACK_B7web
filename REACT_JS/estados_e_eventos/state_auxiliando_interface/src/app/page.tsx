"use client"      // direciona para um ambiente de execução do cliente (navegador), necessário no Next.js para indicar que este código é executado no lado do cliente (navegador) e não no lado do servidor

import { useState } from "react"; // importa o hook useState do React, que permite a criação de estados dentro de componentes funcionais

const Page = () => {
  
  const [showSecret, setShowSecret] = useState(false);    // cria um estado chamado 'showSecret', inicializado como false, e uma função para atualizar esse estado, chamada 'setShowSecret'

  const handleClickButton = () => {       // função que alterna o valor de 'showSecret' entre 'true' e 'false'
    setShowSecret(!showSecret);     // inverte o valor atual de 'showSecret'. Se for false, torna-se true, e vice-versa
  }

  return (      // JSX retornado pela função Page, define a estrutura da interface
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-3xl">
      <button onClick = {handleClickButton} className = "bg-blue-500 p-3">      {/* botão que, ao ser clicado, chama a função handleClickButton */}
        {showSecret ? 'Ocultar' : 'Mostrar'}        {/* o texto do botão muda dependendo do valor de 'showSecret'. Se true, mostra "Ocultar", caso contrário, "Mostrar" */}
      </button>

      {/* O bloco abaixo é renderizado condicionalmente, ou seja, só aparece quando 'showSecret' é true */}
      {showSecret && 
        <div className = "p-3 bg-blue-300 rounded-md md-3">
          Área Secreta          {/* Texto que aparece na "Área Secreta" */}
        </div>
      }
    </div>
  );
}

export default Page; 
