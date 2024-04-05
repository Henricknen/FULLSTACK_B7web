function addSquares(a, b) {
    // function square(x) {        // função que calculará a 'raiz quadrada' de x
    //     return x * x
    // }

    const square = (x) => x * x;        // ultilizando uma 'arrow funtion' para evitar ter o nome function dentro da function

    let sqrA = square(a);       // ultilizando função 'square'
    let sqrB = square(b);
    return sqrA + sqrB;     // retornando a soma das raiz quadradas
}

console.log(addSquares(2, 3));