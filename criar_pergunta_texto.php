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
$sql = "INSERT INTO perguntas_texto (pergunta) VALUES ('$pergunta')";
if ($conn->query($sql) === TRUE) {
    $response = array('success' => true, 'message' => 'Pergunta de texto criada com sucesso');
} else {
    $response = array('success' => false, 'message' => 'Erro ao criar pergunta de texto');
}


// Fecha a conexão com o banco de dados
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>