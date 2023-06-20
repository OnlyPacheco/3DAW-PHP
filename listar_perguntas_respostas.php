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


// Consulta todas as perguntas de múltipla escolha
$sql = "SELECT * FROM perguntas_multipla";
$result = $conn->query($sql);

// Array para armazenar as perguntas
$perguntasMultipla = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Obtém as opções de cada pergunta
        $idPergunta = $row['id'];
        $sqlOpcoes = "SELECT * FROM opcoes_multipla WHERE id_pergunta = '$idPergunta'";
        $resultOpcoes = $conn->query($sqlOpcoes);

        // Array para armazenar as opções
        $opcoes = array();
        while ($rowOpcao = $resultOpcoes->fetch_assoc()) {
            $opcoes[] = $rowOpcao['opcao'];
        }

        // Adiciona a pergunta ao array de perguntas
        $pergunta = array(
            'id' => $idPergunta,
            'pergunta' => $row['pergunta'],
            'opcoes' => $opcoes
        );
        $perguntasMultipla[] = $pergunta;
    }
}

// Consulta todas as perguntas de texto
$sql = "SELECT * FROM perguntas_texto";
$result = $conn->query($sql);

// Array para armazenar as perguntas de texto
$perguntasTexto = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Adiciona a pergunta ao array de perguntas de texto
        $pergunta = array(
            'id' => $row['id'],
            'pergunta' => $row['pergunta']
        );
        $perguntasTexto[] = $pergunta;
    }
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
