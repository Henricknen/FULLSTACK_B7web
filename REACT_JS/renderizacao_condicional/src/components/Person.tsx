type Props = {      // criação das 'props'
    name: string;
    avatar?: string;       // '?' torna a props avatar 'opcional'
    roles: string[];
}

export const Person = ({
    name, 
    avatar = 'https://png.pngtree.com/element_our/20200610/ourmid/pngtree-character-default-avatar-image_2237203.jpg',      // inserindo uma imagem 'pradrão' no avatar
    roles
}: Props) => {

    return (
        <div className = "p-3">
            <h1>{name}</h1>
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