                            // 1º                          2º              3º            4º
let hard_skills = ['javascript, php, python ,sql', 'laravel, angular', 'html, css', 'arduino, clp'];        // array de hard skills

let [back_end, framework, automacao, front_end] = hard_skills;      // pegando e dandando nome aos elementos do array em sequencia
console.log(back_end, framework, front_end, automacao);

// ------------------------------------------------------------------------------------------------------
                        // 1º                          2º              3º              4º
let fullstack = ['javascript, php, python ,sql', 'laravel, angular', 'arduino, clp', 'html, css'];
//     1º          2º    3º   4º
let [backend, frameworkk, ,frontend] = fullstack;
console.log(backend, frameworkk, frontend);       // pegando só as liguagens e frameworks fullstack

// ------------------------------------------------------------------------------------------------------
// 1º                          2º              3º              4º
let automacao_eletrica = ['javascript, php, python ,sql', 'laravel, angular', 'arduino, clp', 'html, css'];
//   1º2º            3º         4º
let [ , , residencial_industrial, ] = automacao_eletrica;
console.log(residencial_industrial);

// ------------------------------------------------------------------------------------------------------

let [pos_graduacao, graduacao, tecnico] = ['Desenvolvimento web', 'analise e desenvolvimento de sistemas', 'informatica para internet'];        // criando um array e já fazendo sua desconstrução
console.log(pos_graduacao, '/', graduacao, '/', tecnico);