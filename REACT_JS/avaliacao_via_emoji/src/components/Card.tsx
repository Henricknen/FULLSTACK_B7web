type Props = {
    phrase: string;
    author?: string;
}

export const Card = ({ phrase, author }: Props) => {
    return(
        <div className = "w-96 border-2 border-red-600 p-3 text-3xl text-center italic">
            <h3 className = "text-3l font-bold italic">"{phrase}"</h3>
            {author &&      // o operador lógico and '&&' apresenta a menssagem abaixo se o author existir
                <p className = "text-right text-sm">- {author}</p>
            }
            {!author &&     // se o author 'não existir' apresenta a menssagem abaixo
                <p className = "text-right text-sm italic">- Autor Desconheçido</p>
            }
        </div>
    );
}