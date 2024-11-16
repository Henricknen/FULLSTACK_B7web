const Page = () => {
  const fullTime = new Intl.DateTimeFormat('pt-BR', {   // pegando a hora atual   
    timeStyle: 'short',
    hour12: false   // hour12 'false' o formato da será de 24 horas
  }). format();

  const hour = new Date(). getHours();    // pegando apenas a hora
  let greeting = '';    // variável 'greeting' vazia será preenchida dependendo da hora atual

  if(hour >= 0 && hour < 12) {    // condiçionais para apresentação do 'greenting' com base no 'getHours'
    greeting = 'Bom dia...';
  } else if(hour >= 12 && hour < 18) {
    greeting = 'Boa tarde...';
  } else if(hour >= 18 && hour < 23) {
    greeting = 'Boa noite...';
  }

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-white bg-gradient-to-r from-sky-500 to-into-500">
      <div className = "text-9xl">{fullTime}</div>    {/* area do relógio */}
      <div className = "text-5xl font-bold">{greeting}</div>    {/* area da saudação */}
    </div>
  );
}

export default Page;