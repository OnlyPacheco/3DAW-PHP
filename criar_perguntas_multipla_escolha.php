<!DOCTYPE html>
<html>
<head>
    <title>Criar Perguntas e Respostas de Múltipla Escolha</title>
</head>
<body>
    <h1>Criar Perguntas e Respostas de Múltipla Escolha</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="pergunta">Pergunta:</label>
        <input type="text" name="pergunta" id="pergunta" required><br><br>
        <label for="opcao1">Opção 1:</label>
        <input type="text" name="opcoes[]" id="opcao1" required><br><br>
        <label for="opcao2">Opção 2:</label>
        <input type="text" name="opcoes[]" id="opcao2" required><br><br>
        <label for="opcao3">Opção 3:</label>
        <input type="text" name="opcoes[]" id="opcao3" required><br><br>
        <label for="opcao4">Opção 4:</label>
        <input type="text" name="opcoes[]" id="opcao4" required><br><br>
        <label for="resposta">Resposta Correta:</label>
        <input type="text" name="resposta" id="resposta" required><br><br>
        <input type="submit" name="submit" value="Criar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Recebe os dados do formulário
        $pergunta = $_POST['pergunta'];
        $opcoes = $_POST['opcoes'];
        $respostaCorreta = $_POST['resposta'];

        // Código para criar a pergunta e respostas de múltipla escolha no arquivo ou no banco de dados

        // Exemplo: criar no arquivo perguntas.txt
        $arquivo = fopen("perguntas.txt", "a");
        fwrite($arquivo, $pergunta . PHP_EOL);
        foreach ($opcoes as $opcao) {
            fwrite($arquivo, $opcao . PHP_EOL);
        }
        fwrite($arquivo, $respostaCorreta . PHP_EOL);
        fclose($arquivo);

        // Exibir mensagem de sucesso
        echo "Pergunta e respostas de múltipla escolha criadas com sucesso!";
    }
    ?>
</body>
</html>
