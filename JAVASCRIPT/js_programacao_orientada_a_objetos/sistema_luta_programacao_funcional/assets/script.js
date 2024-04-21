const hero = createKnight('Luis Henrique');     // criacão do 'cavaleiro'
const monster = createLittleMonster();      // criação do 'pequeno mostro'

stage.start(
    hero,
    monster,
    document.querySelector('#hero'),
    document.querySelector('#monster')
);