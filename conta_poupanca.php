<?php
include_once 'ContaPoupanca.php';
$contaPoupanca=new ContaPoupanca(); /* criado o objeto ContaPoupanca */

if(isset($_POST['depositar'])){
    $quantia=floatval($_POST['quantia']);
    $contaPoupanca->aplicarJuros();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conta Poupança</title>
</head>

<body>
    <header>
        <h1>Detalhes da Conta Poupança</h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
        <a href="conta_corrente.php">Conta Corrente</a>
    </nav>
    <div class="container">
        <?php
        $contaPoupanca->getSaldo();
        ?>
        <?php
        echo"O saldo atual da conta é R$: " .number_format($contaPoupanca->getSaldo(),2,',','.');
        ?>
        
        <form action="" method="post">
            <label for="quantia">Depósito</label>
            <input type="number" name="quantia" required>
            <input type="submit" name="depositar" value="Depositar">
        </form>
        <form action="" method="post">
            <input type="submit" name="aolicarJuros" value="aplicarJuros">

        </form>
    </div>

</body>

</html>