let hero = new Knight('Luis Henrique');
let monster = new LittleMonster();

const stage = new Stage(
    hero,
    monster,
    document.querySelector('#hero'),
    document.querySelector('#monster')
);

stage.start();