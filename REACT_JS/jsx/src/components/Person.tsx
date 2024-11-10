export const Person = () => {        // componente 'Person'
    const name: string = 'Elon Musk';        // variável
    const avatar: string = 'https://classic.exame.com/wp-content/uploads/2021/04/Elon-Musk.jpg';
    return (
        <>      {/* utilizando 'fragment' é basicamente uma tag sem nome */}
            <h1>{name}</h1>     {/* exibindo a variável name */}
            <img src = {avatar} 
            alt = {name}
            className = "w-40"
            />
            <ul>
                <li>CEO da Tesla</li>
                <li>CEO da SpaceX</li>
            </ul>
        </>
    )
}