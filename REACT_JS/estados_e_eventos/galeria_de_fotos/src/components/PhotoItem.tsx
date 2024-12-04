// componente de exibição de foto   
import { Photo } from "@/types/Photo";

type Props = {      // props com os 'dados' das fotos
    photo: Photo;
    onClick: () => void;
}

export const PhotoItem = ({ photo, onClick}: Props) => {       // recçebendo como parâmentros a 'props'
    return (
        <div onClick = {onClick} className = "cursor-pointer hover:opacity-80">
            <img src = {`/assets/${photo.url}`} alt = "" className = "w-full" />        {/* exibindo a foto */}
        </div>
    );
}