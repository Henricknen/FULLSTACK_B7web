"use client"    // convertendo componente em um componente 'client componant'

const Page = () => {
  function handleclick() {    {/* função de click */}
    alert("O botão foi clicado!!!");
  }

  return (
    <div className = "w-screen h-screen flex justify-center items-center">    {/* formatação deixa o botão ao centro da tela */}
      <button onClick = {handleclick} className = "p-3 bg-blue-700 text-white rounded-md">Clique aqui...</button>    {/* botão utilizanodo 'onClick' com uma expressão '{}' com nome da função que será executada */}
    </div>
  );
}

export default Page;