<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $modulos = new Modulos();       // instançiando classe 'Modulos'

        $data['modulos'] = $modulos-> getList();        // pegando a lista dos modulos

        $this-> loadTemplate('home', $data);
    }

    public function pegar_aulas() {

    	if(isset($_POST['modulo'])) {       // se foi reçebido 'modulo'

    		$id_modulo = $_POST['modulo'];      // será armazendado em '$id_modulo'

    		$aulas = new Aulas();

    		$array = $aulas-> getAulas($id_modulo);     // ultilizando função 'getAulas'

    		echo json_encode($array);       // retornando um 'json'
    		exit;

    	}

    }
















}