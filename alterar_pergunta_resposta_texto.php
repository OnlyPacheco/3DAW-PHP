<!DOCTYPE html>
<html>
<head>
    <title>Alterar Pergunta e Resposta de Texto</title>
</head>
<body>
    <h1>Alterar Pergunta e Resposta de Texto</h1>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeroPergunta = $_POST['numero_pergunta'];
        $novaPergunta = $_POST['nova_pergunta'];
        $novaResposta = $_POST['nova_resposta'];

        // Lê todas as perguntas do arquivo de perguntas de texto
        $perguntasTexto = file("perguntas_texto.txt", FILE_IGNORE_NEW_LINES);

        // Verifica se o número da pergunta é válido
        if ($numeroPergunta > 0 && $numeroPergunta <= count($perguntasTexto) && ($numeroPergunta - 1) % 2 === 0) {
            // Calcula o índice da pergunta no array
            $indice = ($numeroPergunta - 1) / 2;

            // Atualiza a pergunta e a resposta no array
            $perguntasTexto[$indice * 2] = $novaPergunta;
            $perguntasTexto[$indice * 2 + 1] = $novaResposta;

            // Grava as perguntas atualizadas no arquivo de perguntas de texto
            file_put_contents("perguntas_texto.txt", implode(PHP_EOL, $perguntasTexto));

            echo "Pergunta e resposta de texto alteradas com sucesso!";
        } else {
            echo "Número de pergunta inválido!";
        }
    }
    ?>

    <form method="POST">
        <label for="numero_pergunta">Número da Pergunta:</label>
        <input type="number" id="numero_pergunta" name="numero_pergunta" required><br>

        <label for="nova_pergunta">Nova Pergunta:</label>
        <input type="text" id="nova_pergunta" name="nova_pergunta" required><br>

        <label for="nova_resposta">Nova Resposta:</label>
        <input type="text" id="nova_resposta" name="nova_resposta" required><br>

        <input type="submit" value="Alterar">
    </form>
</body>
</html>