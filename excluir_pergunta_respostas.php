<html>
<head>
    <title>Excluir Pergunta e Respostas</title>
</head>
<body>
    <h1>Excluir Pergunta e Respostas</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="numeroPergunta">Número da Pergunta:</label>
        <input type="number" name="numeroPergunta" id="numeroPergunta" required><br><br>
        <label for="tipoPergunta">Tipo de Pergunta:</label>
        <select name="tipoPergunta" id="tipoPergunta">
            <option value="perguntasTexto">Perguntas de Texto</option>
            <option value="perguntas">Perguntas de Múltipla Escolha</option>
        </select><br><br>
        <input type="submit" name="submit" value="Excluir">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Recebe o número da pergunta e o tipo de pergunta
        $numeroPergunta = $_POST['numeroPergunta'];
        $tipoPergunta = $_POST['tipoPergunta'];

        if ($tipoPergunta === 'perguntasTexto') {
            // Ler todas as perguntas do arquivo perguntas_texto.txt
            $perguntas = file("perguntas_texto.txt", FILE_IGNORE_NEW_LINES);
            $arquivoPerguntas = "perguntas_texto.txt";
        } elseif ($tipoPergunta === 'perguntas') {
            // Ler todas as perguntas do arquivo perguntas.txt
            $perguntas = file("perguntas.txt", FILE_IGNORE_NEW_LINES);
            $arquivoPerguntas = "perguntas.txt";
        }

        // Verifica se o número da pergunta é válido
        if ($numeroPergunta > 0 && $numeroPergunta <= count($perguntas)) {
            $indice = ($numeroPergunta - 1) * 2;

            // Remove a pergunta e sua resposta
            array_splice($perguntas, $indice, 2);

            // Salva as perguntas atualizadas no arquivo
            file_put_contents($arquivoPerguntas, implode(PHP_EOL, $perguntas));

            echo "Pergunta e resposta excluídas com sucesso!";
        } else {
            echo "Número de pergunta inválido!";
        }
    }
    ?>
</body>
</html>
