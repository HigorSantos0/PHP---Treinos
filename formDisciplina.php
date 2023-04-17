<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulário de Disciplinas</title>
</head>

<body>
    <h1>Formulário de Disciplinas</h1>

    <?php
    // Verifica se o formulário foi enviado
    if (isset($_POST['submit'])) {
        // Abre o arquivo para escrita
        $arquivo = fopen("disciplina.txt", "a+");
        // Escreve as informações no arquivo separadas por ';'
        fwrite($arquivo, $_POST['nome'] . ";" . $_POST['curso'] . ";" . $_POST['semestre'] . PHP_EOL);
        // Fecha o arquivo
        fclose($arquivo);
    }
    ?>

    <form method="POST">
        <label for="nome">Nome da disciplina:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso" required>
        <br>
        <label for="semestre">Semestre:</label>
        <input type="number" name="semestre" id="semestre" required>
        <br>
        <input type="submit" name="submit" value="Enviar">
    </form>

    <br>

    <h2>Lista de Disciplinas</h2>

    <table style="border: 1px solid">
        <tr>
            <th>Nome da Disciplina</th>
            <th>Curso</th>
            <th>Semestre</th>
        </tr>
        <?php
        $arqDisc = fopen("disciplina.txt", "r") or die("erro ao abrir arquivo");
        while (!feof($arqDisc)) {
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
