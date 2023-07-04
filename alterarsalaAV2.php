<?php
$servername = 'localhost';
$username = 'OnlyPacheco';
$password = '123';
$dbname = 'provaAv2';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Erro na conexão com o banco de dados , meu cria: ' . $conn->connect_error);
}

$cpf = $_POST['cpf'];
$novaSala = $_POST['novaSala'];

$sql = "UPDATE candidatos SET salaprova = $novaSala WHERE cpf = '$cpf'";

if ($conn->query($sql) === TRUE) {
  echo 'Sala de prova alterada com sucesso , menó.';
} else {
  echo 'Erro ao alterar sala de prova, chefe: ' . $conn->error;
}

$conn->close();
?>
