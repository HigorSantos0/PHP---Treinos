<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Disciplinas</title>
</head>
<body>
    <h1>Lista de Disciplinas</h1>
    <?php
        $arqDisc = fopen("disciplina.txt", "r") or die("erro ao abrir arquivo");

        echo fgets($arqDisc);
        echo "<br>";
        $cabecalho = explode(";", fgets($arqDisc));
        echo $cabecalho[0];
        echo "<br>";
        echo fgets($arqDisc);
    ?>
    <br>

    <table style="border: 1px solid">
        <tr>
            <th><?php echo $cabecalho[0] ?></th>
            <th><?php echo $cabecalho[1] ?></th>
            <th><?php echo $cabecalho[2] ?></th>
        </tr>
        <?php
            while(!feof($arqDisc)) {
                $linha = fgets($arqDisc);
                if (!empty($linha)) {
                    $disciplina = explode(";", $linha);
                    echo "<tr>";
                    echo "<td>" . $disciplina[0] . "</td>";
                    echo "<td>" . $disciplina[1] . "</td>";
                    echo "<td>" . $disciplina[2] . "</td>";
                    echo "</tr>";
                }
            }
            fclose($arqDisc);
        ?>
    </table>
</body>
</html>