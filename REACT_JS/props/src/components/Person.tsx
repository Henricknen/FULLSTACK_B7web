type Props = {      // criação das 'props'
    name: string;
    avatar: string;
    roles: string[];
    address?: string;       // '?' torna a props address 'opcional'
}

export const Person = ({name, avatar, roles}: Props) => {        // componente 'Person', recebendo variáveis name, avatar e roles da 'props'

    return (
        <div className = "p-3">
            <h1>{name}</h1>     {/* utilizando variál 'name' da 'props' */}
            <img 
                src = {avatar} 
                alt = {name}
                className = "w-40"
            />
            <ul>
                <li>{roles[0]}</li>
                <li>{roles[1]}</li>
            </ul>
        </div>
    )
}