<!DOCTYPE html>
<html>
<head>
    <title>Listar uma Pergunta e Respostas</title>
</head>
<body>
    <h1>Listar uma Pergunta e Respostas</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="numeroPergunta">Número da Pergunta:</label>
        <input type="number" name="numeroPergunta" id="numeroPergunta" required><br><br>
        <label for="tipoPergunta">Tipo de Pergunta:</label>
        <select name="tipoPergunta" id="tipoPergunta">
            <option value="multiplaEscolha">Múltipla Escolha</option>
            <option value="texto">Texto</option>
        </select><br><br>
        <input type="submit" name="submit" value="Listar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Recebe o número da pergunta e o tipo de pergunta
        $numeroPergunta = $_POST['numeroPergunta'];
        $tipoPergunta = $_POST['tipoPergunta'];

        if ($tipoPergunta === 'multiplaEscolha') {
            // Ler todas as perguntas de múltipla escolha do arquivo perguntas_multipla_escolha.txt
            $perguntas = file("perguntas_multipla_escolha.txt", FILE_IGNORE_NEW_LINES);

            // Verifica se o número da pergunta é válido
            if ($numeroPergunta > 0 && $numeroPergunta <= count($perguntas) / 5) {
                $indice = ($numeroPergunta - 1) * 5;
                $pergunta = $perguntas[$indice];
                $opcoes = array_slice($perguntas, $indice + 1, 4);
                $respostaCorreta = $perguntas[$indice + 5];

                echo "<h3>Pergunta: $pergunta</h3>";
                echo "<ul>";
                foreach ($opcoes as $opcao) {
                    echo "<li>$opcao</li>";
                }
                echo "</ul>";
                echo "<p>Resposta Correta: $respostaCorreta</p>";
            } else {
                echo "Número de pergunta inválido!";
            }
        } elseif ($tipoPergunta === 'texto') {
            // Ler todas as perguntas de texto do arquivo perguntas_texto.txt
            $perguntas = file("perguntas_texto.txt", FILE_IGNORE_NEW_LINES);

            // Verifica se o número da pergunta é válido
            if ($numeroPergunta > 0 && $numeroPergunta <= count($perguntas)) {
                $indice = $numeroPergunta - 1;
                $pergunta = $perguntas[$indice];
                $resposta = $perguntas[$indice + 1];

                echo "<h3>Pergunta: $pergunta</h3>";
                echo "<p>Resposta: $resposta</p>";
            } else {
                echo "Número de pergunta inválido!";
            }
        }
    }
    ?>
</body>
</html>
