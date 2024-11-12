import { Card } from "@/components/Card";
import { Circle } from "@/components/Circle";

const Page = () => {
  return (
    <div>
      <h2 className = "font-bold text-2xl">Codificando</h2>
      <h1>ReactJs</h1>

      <Card>    {/* utilizando componente 'Card' */}
          <>
            <h3 className = "text-3xl font-bold italic">ReactJs</h3>    {/* Passando conteúdo como 'children' para o componente Card */}
            <p className = "text-right text-sm">Criado por: Luis Henrique S F</p>
            <Circle/>
          </>
      </Card>

    </div>
  );
}

export default Page;