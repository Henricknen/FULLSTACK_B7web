let log = new Log(document.querySelector('.log'));

let hero = new Knight('Luis Henrique');
let monster = new LittleMonster();

const stage = new Stage(
    hero,
    monster,
    document.querySelector('#hero'),
    document.querySelector('#monster'),
    log
);

stage.start();