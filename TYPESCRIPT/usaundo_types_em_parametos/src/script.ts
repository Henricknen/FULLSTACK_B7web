function firstLetterUpperCase(name: string) {      // função colocará a primeira letra em maisculo, 'string' depois de name indica que é uma string
    let firstLetter = name.charAt(0).toUpperCase();     // 'charAt' pega a primeira letra, 'toUpperCase' joga a letra para caixa alta
    return firstLetter + name.substring(1);
}

firstLetterUpperCase('luisHenrique');       // terá que se retornado 'LuisHenrique'