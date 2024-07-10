function mostrarIdade(idade: string | number) {    // função 'mostrarIdade' recebendo parâmetro 'idade' que pode ser do tipo 'string' ou 'number'
    if(typeof idade === 'string') {
        console.log(idade. toUpperCase());     // se o type for 'string', imprime a idade em letras maiúsculas
    } else {
        console.log(idade);     // se o type for 'diferente' de string
    }
}

mostrarIdade(90); // Chamando a função com um número
mostrarIdade('90'); // Chamando a função com uma string
