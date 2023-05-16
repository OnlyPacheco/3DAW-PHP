<!DOCTYPE html>
<html>
<head>
    <title>Alterar Pergunta e Resposta de Múltipla Escolha</title>
</head>
<body>
    <h1>Alterar Pergunta e Resposta de Múltipla Escolha</h1>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeroPergunta = $_POST['numero_pergunta'];
        $novaPergunta = $_POST['nova_pergunta'];
        $novasOpcoes = $_POST['nova_opcao'];
        $novaRespostaCorreta = $_POST['nova_resposta_correta'];

        // Lê todas as perguntas do arquivo de perguntas de múltipla escolha
      
$perguntasMultiplaEscolha = file("perguntas.txt", FILE_IGNORE_NEW_LINES);


    // Verifica se o número da pergunta é válido
    if ($numeroPergunta > 0 && $numeroPergunta <= count($perguntasMultiplaEscolha) && ($numeroPergunta - 1) % 5 === 0) {
        // Calcula o índice da pergunta no array
        $indice = ($numeroPergunta - 1) / 5;

        // Atualiza a pergunta no array
        $perguntasMultiplaEscolha[$indice * 5] = $novaPergunta;

        // Atualiza as opções de resposta no array
        for ($i = 0; $i < 4; $i++) {
            $perguntasMultiplaEscolha[$indice * 5 + $i + 1] = $novasOpcoes[$i];
        }

        // Atualiza a resposta correta no array
        $perguntasMultiplaEscolha[$indice * 5 + 5] = $novaRespostaCorreta;

        // Grava as perguntas atualizadas no arquivo de perguntas de múltipla escolha
        file_put_contents("perguntas.txt", implode(PHP_EOL, $perguntasMultiplaEscolha));

        echo "Pergunta e resposta de múltipla escolha alteradas com sucesso!";
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

    <label for="nova_opcao_1">Nova Opção 1:</label>
    <input type="text" id="nova_opcao_1" name="nova_opcao[]" required><br>

    <label for="nova_opcao_2">Nova Opção 2:</label>
    <input type="text" id="nova_opcao_2" name="nova_opcao[]" required><br>

    <label for="nova_opcao_3">Nova Opção 3:</label>
    <input type="text" id="nova_opcao_3" name="nova_opcao[]" required><br>

    <label for="nova_opcao_4">Nova Opção 4:</label>
    <input type="text" id="nova_opcao_4" name="nova_opcao[]" required><br>

    <label for="nova_resposta_correta">Nova Resposta Correta:</label>
    <input type="text" id="nova_resposta_correta" name="nova_resposta_correta" required><br>

    <input type="submit" value="Alterar">
</form>
</body>
</html>