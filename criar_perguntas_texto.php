<!DOCTYPE html>
<html>
<head>
    <title>Criar Perguntas e Respostas de Texto</title>
</head>
<body>
    <h1>Criar Perguntas e Respostas de Texto</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="pergunta">Pergunta:</label>
        <input type="text" name="pergunta" id="pergunta" required><br><br>
        <label for="resposta">Resposta:</label>
        <input type="text" name="resposta" id="resposta" required><br><br>
        <input type="submit" name="submit" value="Criar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Recebe os dados do formulário
        $pergunta = $_POST['pergunta'];
        $resposta = $_POST['resposta'];

        // Código para criar a pergunta e resposta de texto no arquivo ou no banco de dados

        // Exemplo: criar no arquivo perguntas.txt
        $arquivo = fopen("perguntas_texto.txt", "a");
        fwrite($arquivo, $pergunta . PHP_EOL);
        fwrite($arquivo, $resposta . PHP_EOL);
        fclose($arquivo);

        // Exibir mensagem de sucesso
        echo "Pergunta e resposta de texto criadas com sucesso!";
    }
    ?>
</body>
</html>
