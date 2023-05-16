<!DOCTYPE html>
<html>
<head>
    <title>Listar Todas as Perguntas e Respostas</title>
</head>
<body>
    <h1>Listar Todas as Perguntas e Respostas</h1>

    <?php
    // Ler todas as perguntas do arquivo perguntas.txt
    $perguntas = file("perguntas.txt", FILE_IGNORE_NEW_LINES);

    // Exibir as perguntas e respostas de múltipla escolha
    for ($i = 0; $i < count($perguntas); $i += 6) {
        $pergunta = $perguntas[$i];
        $opcoes = array_slice($perguntas, $i + 1, 4);
        $respostaCorreta = $perguntas[$i + 5];

        echo "<h3>Perguntas Múltipla Escolha: $pergunta</h3>";
        echo "<ul>";
        foreach ($opcoes as $opcao) {
            echo "<li>$opcao</li>";
        }
        echo "</ul>";
        echo "<p>Resposta Correta: $respostaCorreta</p>";
        echo "<hr>";
    }

    // Ler todas as perguntas de texto do arquivo perguntas_texto.txt
    $perguntasTexto = file("perguntas_texto.txt", FILE_IGNORE_NEW_LINES);

    // Exibir as perguntas e respostas de texto
    for ($i = 0; $i < count($perguntasTexto); $i += 2) {
        $pergunta = $perguntasTexto[$i];
        $resposta = $perguntasTexto[$i + 1];

        echo "<h3>Perguntas Texto: $pergunta</h3>";
        echo "<p>Resposta: $resposta</p>";
        echo "<hr>";
    }
    ?>
</body>
</html>
