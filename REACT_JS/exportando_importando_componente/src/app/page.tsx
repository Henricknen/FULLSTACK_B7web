import Square from '@/components/Geo';    // importando componente padrão 'Square' que está localizado na pasta 'components'
import { Circle } from '@/components/Geo';    // importando components 'Circle' 

const Page = () => {    // componente 'Page'
  return (
    <div>
      <h1 className = "font-bold text-2xl">Olá Mundo</h1>
      <h3>Texto qualquer...</h3>

      <Square />   {/* utilizando componente importado */}
      <Circle />
    </div>
  );
}

export default Page;