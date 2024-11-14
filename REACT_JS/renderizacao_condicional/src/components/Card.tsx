type Props = {
    phrase: string;     // a frase que será exibida no componente
    author?: string;         // o autor da frase é opcional '?'
}

export const Card = ({ phrase, author }: Props) => {
    return(
        <div className = "w-96 border-2 border-red-600 p-3 text-3xl text-center italic">
            <h3 className = "text-3l font-bold italic">"{phrase}"</h3>      {/* exibindo a frase */}
            <p className = "text-right text-sm">- {author ? author : 'Autor Desconhecido'}</p>      {/* utilizando operador tenário '?:' para executar a condicional se o author 'existir' será exibido 'se não existir' será exibido a frase 'Autor Desconhecido' */}
        </div>
    );
}