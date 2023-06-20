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

// Exclui as opções da pergunta de múltipla escolha
$sql = "DELETE FROM opcoes_multipla WHERE id_pergunta = '$idPergunta'";
$conn->query($sql);

// Exclui a pergunta de múltipla escolha
$sql = "DELETE FROM perguntas_multipla WHERE id = '$idPergunta'";
if ($conn->query($sql) === TRUE) {
    $response = array('success' => true, 'message' => 'Pergunta de múltipla escolha excluída com sucesso');
} else {
    $response = array('success' => false, 'message' => 'Erro ao excluir pergunta de múltipla escolha');
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
