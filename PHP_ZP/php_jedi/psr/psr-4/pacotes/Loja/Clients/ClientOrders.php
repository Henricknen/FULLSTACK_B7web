<?php       // arquivo de classes responsável pelas compras do cliente
namespace Loja\Clients;      // 'namespace' espeçifica o diretório onde está a classe
class ClientOrders {

    public function getAll() {
        return array(
            'compra 1',
            'compra 2',
            'compra 3'
        );
    }
}