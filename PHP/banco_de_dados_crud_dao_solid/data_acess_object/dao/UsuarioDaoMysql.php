<?php
require_once 'models/Usuario.php';       // 'require_once' inclui 'Usuario.php' e garante que não seja incluido novamente

class UsuarioDaoMysql implements UsuarioDAO {       // implementando 'interface UsuarioDAO'
    private $pdo;       // reçebendo '$pdo' de fora através de injeção de dependênçia

    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function add(Usuario $u) {

    }

    public function findAll() {
        $array = [];

        $sql = $this-> pdo-> query("SELECT * FROM usuarios");       //  ultilizando 'pdo' para fazer a consulta
        if($sql-> rowCount() > 0) {     // verificando se tem algum item
            $data = $sql-> fetchAll();      // adiçionando os itens em '$data'

            foreach($data as $item) {       // fazendo 'foreach' nos dados reçebidos '$data' para criar objetos
                $u = new Usuario();     // criação do objeto '$u'
                $u-> setId($item['id']);        // preenchendo o objeto '$u' com os dados que vieram do 'banco de dados'
                $u-> setNome($item['nome']);
                $u-> setEmail($item['email']);

                $array[] = $u;        // os objetos serão jogados dentro do '$array'
            }
        }

        return $array;
    }

    public function findById($id) {

    }

    public function update(Usuario $u) {

    }

    public function delete($id) {

    }
}