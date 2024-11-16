import { professionalList } from '@/data/professionalList';   // importando arquivo 'professionalList'


  const Page = () => {

    const Full_Stack = professionalList.filter(person => person.profession === 'Full_Stack');   // função 'filter' realiza a filtragem em cada um dos itens, condição a profession tem que ser 'Full_Stack'

  return (
    <div>
      <h1 className = "font-bond text-2xl">Filtragem de lista</h1>
      <h3>Exibindo meu nome completo</h3>

      {Full_Stack.length > 0 &&   // verificação 
      <>
        <h3>Meu nome é:</h3>
        <ul>
          {Full_Stack.map(person =>
          <li key = {person.id}>{person.name}</li>    // mostra os nomes que passaram pela condição
            )}
        </ul>
      </>
      }
      
    </div>
  );
}

export default Page;