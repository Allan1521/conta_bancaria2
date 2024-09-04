<?php
require_once 'ContaBancaria.php';
class ContaPoupanca extends ContaBancaria{
    private $taxadeJuros;
public function __construct($taxadeJuros=0.0005){
    parent::__construct();
    $this->taxaDeJuros=$taxadeJuros;
}
public function aplicarJuros(){
    /* round é uma função do php que faz arrendondamento */
    $juros=round($this->getSaldo() * $this->taxaDeJuros,2);
    $this->depositar($juros);
    echo "Juros de $juros reais aplicados.<br>";
}    

}
?>