<?php
include_once 'ContaCorrente.php';
$contaCorrente = new ContaCorrente();
/* verifica se o usuário enviou um valor no depósito */
if(isset($_POST['depositar'])){
    $quantidade = floatval($_POST['quantia']);
    $contaCorrente->depositar($quantidade);
}
/* verifica se o usuário enviou um valor no saque */
if(isset($_POST['sacar'])){
    $quantidade = floatval($_POST['quantia']);
    $contaCorrente->sacar($quantidade);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCC.css">
    <title>Conta Corrente</title>
</head>

<body>
    <header>
        <h1>Detalhes da Conta Corrente</h1>
    </header>
    <nav>
        <a href="index.php">Início</a>
        <a href="conta_poupanca.php">Poupança</a>
    </nav>
    <div class="container">
        <?php
        echo "O limite atual da conta é R$: ".number_format($contaCorrente->getSaldo(),2,',','.')."<br>";
        echo "O limite atual da conta é R$: ".number_format($contaCorrente->getlimite(),2,',','.');
        ?>
        <form action="" method="post">
            <label for="quantia">Depósito</label>
            <input type="number" name="quantia" id="quantia" required>
            <input type="submit" name="depositar" value="depositar">
        </form>
        <form action="" method="post">
            <label for="quantia">Saque</label>
            <input type="number" name="quantia" id="quantia" required>
            <input type="submit" name="sacar" value="sacar">
        </form>

    </div>
</body>

</html>