const getWeekday = () => {      // função 'getWeekday' retorna o dia da semana
    return new Intl.DateTimeFormat('pt-BR', { weekday: 'long'}). format(new Date());
}

export const Person = () => {        // componente 'Person'
    const data = {      // objeto 'data' com informações da pessoa
        name: 'Elon Musk',        // variável 'name'
        avatar: 'https://classic.exame.com/wp-content/uploads/2021/04/Elon-Musk.jpg',        // variável 'avatar' que armazena uma imagem
        roles: ['CEO da Tesla', 'CEO da SpaceX']     // array de 'roles' cargos
    }

    return (
        <>      {/* utilizando 'fragment' é basicamente uma tag sem nome */}
            <h1 style = {{ color: 'red', fontSize: '30px' }}>{data. name} - {getWeekday()}</h1>     {/* utilizando objeto 'data' e sua informação 'name', junto com função 'getWeekday' */}
            <img src = {data. avatar} 
            alt = {data. name}
            className = "w-40"
            />
            <ul>
                <li>{data. roles[0]}</li>       {/* pegando o primeiro cargo que se encontra no array 'roles' cargos */}
                <li>{data. roles[1]}</li>
            </ul>
        </>
    )
}