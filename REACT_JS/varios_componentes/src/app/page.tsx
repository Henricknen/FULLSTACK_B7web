import { GeoForm } from "@/components/GeoForm";     // importando apenas o componente 'GeoForm' que utiliza os outros componentes

const Page = () => {    // componente 'Page'
  return (
    <div>
      <h1 className = "font-bold text-2xl">Olá Mundo</h1>
      <h3>Texto qualquer...</h3>

      <GeoForm />   {/* utilizando componente 'GeoForm' */}
    </div>
  );
}

export default Page;