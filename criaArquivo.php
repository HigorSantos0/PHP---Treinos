<?php
$nome = "";
$sigla = "";
$carga = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
    $linha = "";

    echo "nome: " . $nome . "sigla: " . $sigla . "carga: " . $carga;
    if(!file_exists("disciplina.txt"))
    {
        $arqDisc = fopen("disciplina.txt", "w") or die ("Erro ao criar arquivo");
        $linha = "nome;sigla;carga";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }
    else
    {
        $arqDisc = fopen("disciplina.txt", "a") or die ("Erro ao criar arquivo");
        $linha = $nome . ";" . $sigla . ";" . $carga;
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
</head>
<body>
    <h1>Criando Nova Disciplina<h1>
    <form action="criaArquivo.php" method="POST">
    Nome: <input type="text" name="nome">
    <br>
    Sigla: <input type="text" name="sigla">
    <br>
    CargaHoraria: <input type="text" name="carga">
    <br>
    <input type="submit" value="Gerar Nova Disciplina">
    </form>
    <br>
</body>
</html>
