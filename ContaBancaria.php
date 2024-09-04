
<?php
session_start();
 
class ContaBancaria{//Objeto criado
    private $saldo;//Criado variável $saldo
 
public function __construct(){//Criada a função Consttutor para armazenar saldo
    $this->saldo = isset($_SESSION['saldo'])? $_SESSION['saldo']: 0;
}
public function setSaldo($saldo){//para visualizar saldo
    $this->saldo = $saldo;
    $_SESSION['saldo']=$this->saldo;
}
public function getSaldo(){//para atualizar o saldo
    return $this->saldo;
}
public function sacar($quantidade){//para diminuir o valor ao sacar e apresentar saldo atualizado 
    if($quantidade>0 && $quantidade<=$this->getSaldo()){
        $this->setSaldo($this->getSaldo()-$quantidade);
    }else{
        echo "saldo insuficiente para saque.<br>";
    }
 
}
public function depositar($quantidade){//para adicionar valores junto ao saldo
    if($quantidade>0){
        $saldoNovo=$this->saldo + $quantidade;
        $this->setSaldo($saldoNovo);
    }
}
 
}
 
?>