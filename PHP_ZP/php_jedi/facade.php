<?php
class Purchase {        // classe Compra

    private $order;     // controla o estoque, lista das compras
    private $billing;       // parte pagamento, cobrança
    private $shipping;          // parte de frete, parte logistica

    public function __construct(OrderInterface $order, BillingInterface $billing, ShippingInterface $shipping) {    // reçebendo os objetos em forma de 'interfaçe'

        $this-> order = $order;     // preenchendo as proriedades com os valores das variáveis
        $this-> billing = $billing;
        $this-> shipping = $shipping;
    }

    public function finish() {
        $this-> billing-> chargeCreditCard();       // este objeto 'billing' faz o  processo de requisição do cartão de crédito
        $this-> order-> setStatus($this-> billing-> setStaus());        // mudando o 'status' da compra

        if($this-> order-> isOk()) {        // 'verificando' o status da compra
            $this-> shipping-> addToPipeline($this-> order);        // adiçionando a compra na fila de envio da loja
        }
    }
}

$purchase = new Purchase($border, $billing, $shipping);     // instançiando a classe 'Purchase' mandando as etapas do preoçesso de compra
$purchase-> finish();       // finalizando a compra 'todos os processos'