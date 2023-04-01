<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>

    <?php
    // Define as variáveis iniciais
    $valorA = isset($_POST['numA']) ? $_POST['numA'] : 0;
    $valorB = isset($_POST['numB']) ? $_POST['numB'] : 0;
    $operacao = isset($_POST['opera']) ? $_POST['opera'] : '+';
    $resultado = 0;

    // Verifica qual operador foi selecionado e realiza a operação
    switch ($operacao) {
        case '+':
            $resultado = $valorA + $valorB;
            break;
        case '-':
            $resultado = $valorA - $valorB;
            break;
        case '*':
            $resultado = $valorA * $valorB;
            break;
        case '/':
            $resultado = $valorA / $valorB;
            break;
        default:
            $resultado = 0;
    }

    // Exibe os valores passados e o resultado
    echo "Os valores passados foram $valorA $operacao $valorB <br>";
    echo "O resultado será $resultado";
    ?>

    <form method="post">
        <input type="text" name="numA">
        <select name="opera">
            <option value="+" <?php if ($operacao == '+') echo 'selected'; ?>>+</option>
            <option value="-" <?php if ($operacao == '-') echo 'selected'; ?>>-</option>
            <option value="*" <?php if ($operacao == '*') echo 'selected'; ?>>*</option>
            <option value="/" <?php if ($operacao == '/') echo 'selected'; ?>>/</option>
        </select>
        <input type="text" name="numB">
        <input type="submit" value="Calcular">
    </form>
</body>

</html>