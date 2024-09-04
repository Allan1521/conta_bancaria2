<?php
    include_once 'ContaBancaria.php'; 
    /* é para importar , ele verifica se já foi imporatdo alguma informção */
    /* Criou uma classe ContaCorrente que extende a ContaBancaria */
class ContaCorrente extends ContaBancaria{
    
    private $limite;
    
    public function __construct($limite=500){
        /* criamos o objeto c/método construtor p/iniciar c/limite de R$500 */
        parent::__construct();
        $this->limite=isset($_SESSION['limite'])? $_SESSION['limite']:$limite;

    }
    public function getLimite(){
        return $this->limite;
    }
    public function setLimite($limite){
        $this->limite=$limite;
        $_SESSION['limite']=$this->limite;

    }
    public function sacar($quantidade){
        $saldoDisponivel=$this->getSaldo()+$this->limite;
        if($quantidade > 0 && $quantidade<=$saldoDisponivel){
            if($quantidade > $this->getSaldo()){
                /* Cálcula a quantidade do limite que será usado */
                $ValorUsadoDoLimite = $quantidade - $this->getSaldo();
                /* subtrair do limite o valor  */
                $this->setLimite($this->limite - $ValorUsadoDoLimite);
                $this->setSaldo(0);
                echo "Saque de R$:  $quantidade reais realizado utilizando R$: $ValorUsadoDoLimite do limite";
                echo " Limite restante: R$: ".number_format($this->limite,2,',','.')."<br>";
            } else {
                /* Se a quantidade estiver dentro do limite */
                $this->setSaldo($this->getSaldo()-$quantidade);
                echo "Saque de R$:  $quantidade reais realaizado.<br>";
            } 
            
        } else {
            echo"Saldo e limite imsuficiente para saque. <br>";
        }

    }    
}
?>