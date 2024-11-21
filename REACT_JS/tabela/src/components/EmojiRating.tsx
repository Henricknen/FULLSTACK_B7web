type Props = {
    rate: number;
}

export const EmojiRating = ({ rate }: Props) => {
    if(rate > 5) rate = 5;
    if(rate < 0) rate = 0;

    const emojis = ['', '😞', '😔', '🙂', '😊', '😄'];          // array de emojis
    const rateInt = Math. floor(rate);
    const stars = `${emojis[rateInt]}`. repeat(rateInt) + '🙁'. repeat(5 - rateInt);        // pegando o array de emojis baseado na nota 

    return(
        <div className = "flex items-center text-6xl">
            <div className = "bg-gray-300 p-2 roundend">{rate.toFixed(1)}</div>
            <div className = "ml-3">{stars}</div>
        </div>
    );
}