const Page = () => {
  const fullTime = new Intl.DateTimeFormat('pt-BR', {   // pegando a hora atual   
    timeStyle: 'short',
    hour12: false   // hour12 'false' o formato da será de 24 horas
  }). format();

  const hour = new Date(). getHours();    // função getHours pega a hora atual

  return (
    <div className = "w-screen h-screen flex flex-col justify-center items-center text-white bg-gradient-to-r from-sky-500 to-into-500">
      <div className = "text-9xl">{fullTime}</div>    {/* area do relógio */}
      <div className = "text-5xl font-bold">
        {hour >= 0 && hour < 12 && "Bom Dia !!!"}   {/* condicional indepêndente 'dentro' do jsx */}
        {hour >= 12 && hour < 18 && "Boa Tarde !!!"}
        {hour >= 18 && hour <= 23 && "Boa Noite !!!"}
      </div>
    </div>
  );
}

export default Page;