type Props = {
    rate: number;       // rate 'avaliação' será do type number
}

export const EmojiRating = ({ rate }: Props) => {      // 'exportando' EmojiRating
    if(rate > 5) rate = 5;      // a avaliação 'rate' maxíma sempre será 5
    if(rate < 0) rate = 0;          // a avaliação 'rate' minima sempre será 0

    const rateInt = Math. floor(rate);      // arredondando 'rate' 
    const stars = '🤩'. repeat(rateInt) + '🙁'. repeat(5 - rateInt);        // emoji repetirá a quantidade de 'rate'

    return(
        <div className = "flex items-center text-6xl">      {/* 'flex items-center text-6xl' deixa os itens um ao lado do outro */}
            <div className = "bg-gray-300 p-2 roundend">{rate.toFixed(1)}</div>        {/* 'toFixed(1)' só mostrará uma deçimal depois da vírgula */}
            <div className = "ml-3">{stars}</div>
        </div>
    );
}