import { Person } from "@/components/Person";

const Page = () => {
  return (
    <div>
      <h1 className = "font-bold text-2xl">Olá Mundo</h1>
      <h3>Texto qualquer...</h3>

      <Person
        name = "Elon Musk"
        avatar = "https://classic.exame.com/wp-content/uploads/2021/04/Elon-Musk.jpg"
        roles = {['CEO da Tesla', 'CEO da SpaceX']}
      />
      <Person
        name = "Jeff Bezos"
        avatar = "https://melhorinvestimento.net/wp-content/uploads/2024/04/jeff-bezos-a-historia-do-homem-mais-rico-do-mundo-1-scaled-1.jpg"
        roles = {['CEO da Amazon', 'CEO da Blue Origin']}
      />
      <Person   // criando personagem e passando apenas informações de 'name' e 'roles'
        name = "Luis Henrique"
        roles = {['Analista de sistemas', 'Programador FullStack']}
      />
    </div>
  );
}

export default Page;