<?php
$servername = 'localhost';
$username = 'OnlyPacheco';
$password = '123';
$dbname = 'provaAv2';

// Estabelecendo a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die('Erro na conexão com o banco de dados, meu cria: ' . $conn->connect_error);
}

// Verificando se os dados do formulário foram enviados via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtendo os valores dos campos do formulário
  $sala = $_POST['sala'];
  $fiscal1 = $_POST['fiscal1'];
  $fiscal2 = $_POST['fiscal2'];

  // Atualizando os fiscais dos candidatos na sala de prova específica
  $sql = "UPDATE candidatos SET fiscal_1 = '$fiscal1', fiscal_2 = '$fiscal2' WHERE salaprova = $sala";

  if ($conn->query($sql) === TRUE) {
    echo 'Fiscais incluídos com sucesso, aproveite.';
  } else {
    echo 'Erro ao incluir fiscais, menó: ' . $conn->error;
  }
} else {
  echo 'Requisição inválida, menó.';
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
