<?php
$servername = 'localhost';
$username = 'OnlyPacheco';
$password = '123';
$dbname = 'provaAv2';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Erro na conexão com o banco de dados , meu cria: ' . $conn->connect_error);
}

$sala = $_POST['sala'];
$fiscal1 = $_POST['fiscal1'];
$fiscal2 = $_POST['fiscal2'];

$sql = "UPDATE candidatos SET fiscal_1 = '$fiscal1', fiscal_2 = '$fiscal2' WHERE sala_prova = $sala";

if ($conn->query($sql) === TRUE) {
  echo 'Fiscais incluídos com sucesso , aproveite.';
} else {
  echo 'Erro ao incluir fiscais , menó: ' . $conn->error;
}

$conn->close();
?>
