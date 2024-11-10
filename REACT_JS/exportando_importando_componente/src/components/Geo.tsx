const Square = () => {      // criando componente 'Square'
    return (
        <div className = "w-52 h-52 bg-orange-700 text-white">      {/* criando um quadrado */}
            Texto qualquer...
        </div>
    );
}

export const Circle = () => {      // criando e exportando componente 'Circle'
    return (
        <div className = "w-52 h-52 bg-orange-700 text-white rounded-full">      {/* criando um circulo */}
            Texto qualquer...
        </div>
    );
}

export default Square;      // exportando de forma 'default' padrão o componente 'Square'