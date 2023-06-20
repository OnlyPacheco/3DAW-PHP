<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


// Obtém os dados da requisição
$data = json_decode(file_get_contents('php://input'), true);
$idPergunta = $data['idPergunta'];

// Atualiza a pergunta no banco de dados
$sql = "UPDATE perguntas_multipla SET pergunta = '$pergunta' WHERE id = '$idPergunta'";
if ($conn->query($sql) === TRUE) {
    // Exclui as opções anteriores da pergunta
    $sql = "DELETE FROM opcoes_multipla WHERE id_pergunta = '$idPergunta'";
    $conn->query($sql);

    // Insere as novas opções no banco de dados
    foreach ($opcoes as $opcao) {
        $sql = "INSERT INTO opcoes_multipla (id_pergunta, opcao) VALUES ('$idPergunta', '$opcao')";
        $conn->query($sql);
    }

    $response = array('success' => true, 'message' => 'Pergunta de múltipla escolha atualizada com sucesso');
} else {
    $response = array('success' => false, 'message' => 'Erro ao atualizar pergunta de múltipla escolha');
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna a resposta como JSON
$response = array(
    'perguntasMultipla' => $perguntasMultipla,
    'perguntasTexto' => $perguntasTexto
);
header('Content-Type: application/json');
echo json_encode($response);
?>
