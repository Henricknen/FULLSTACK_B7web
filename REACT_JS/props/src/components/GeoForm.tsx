import { Circle } from "./Circle"
import { Square } from "./Square"

export const GeoForm = () => {      // criando componente 'GeoForm' e utilizando componentes dentro do mesmo
    return (
        <div>
            <h3 className = "text-2xl font-bold">Formas geométricas</h3>

            <div className = "flex gap-2 border-2 p-3">
                <Square />
                <Circle />
            </div>
        </div>
    )
}