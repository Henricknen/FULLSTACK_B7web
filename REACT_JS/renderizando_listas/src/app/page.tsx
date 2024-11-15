import { professionalList } from '@/data/professionalList';   // importando arquivo 'professionalList'


  const Page = () => {

  return (
    <div>
      <h1 className = "font-bond text-2xl">Rendirização de Lista</h1>
      <h3>Profissional:</h3>

      {professionalList. length > 0 &&    // só realiza o retorno dos nomes se tiver pessoas na lista
        <ul>
          {professionalList.map(person =>   // utilizando função 'map' em cada pessoa da lista
            <li>{person.name}</li>   // retornando o nome de cada pessoa da lista
            )}
        </ul>
      }
    </div>
  );
}

export default Page;