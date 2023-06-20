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
$pergunta = $data['pergunta'];
$opcoes = $data['opcoes'];

// Insere a pergunta no banco de dados
$sql = "INSERT INTO perguntas_multipla (pergunta) VALUES ('$pergunta')";
if ($conn->query($sql) === TRUE) {
    $idPergunta = $conn->insert_id;

    // Insere as opções no banco de dados
    foreach ($opcoes as $opcao) {
        $sql = "INSERT INTO opcoes_multipla (id_pergunta, opcao) VALUES ('$idPergunta', '$opcao')";
        $conn->query($sql);
    }

    // Resposta da requisição
    $response = array('success' => true, 'message' => 'Pergunta de múltipla escolha criada com sucesso');
} else {
    $response = array('success' => false, 'message' => 'Erro ao criar pergunta de múltipla escolha');
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
