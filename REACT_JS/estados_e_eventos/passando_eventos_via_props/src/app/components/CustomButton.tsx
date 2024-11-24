type Props = {
    label:string;
    onClick: ()=> void;         // prop 'onClick' reçebe uma função que não retorna nada e não tem nenhum parâmetro
}

export const CustomButton = ({ label, onClick }: Props) => {
    return(
        <button onClick = {onClick} className = "p-3 rounded-md text-white bg-blue-700">{label}</button>
    );
}