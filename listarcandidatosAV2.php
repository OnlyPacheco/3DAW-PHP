<?php
$servername = 'localhost';
$username = 'OnlyPacheco';
$password = '123';
$dbname = 'provaAv2';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Erro na conexão com o banco de dados , meu cria: ' . $conn->connect_error);
}

$sql = 'SELECT * FROM candidatos ORDER BY sala_prova, nome';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo 'Nome: ' . $row['nome'] . '<br>';
    echo 'CPF: ' . $row['cpf'] . '<br>';
    echo 'Identidade: ' . $row['identidade'] . '<br>';
    echo 'Email: ' . $row['email'] . '<br>';
    echo 'Cargo Que procura: ' . $row['cargo_pretendido'] . '<br>';
    echo 'Sala de Prova: ' . $row['sala_prova'] . '<br><br>';
  }
} else {
  echo 'Nenhum candidato encontrado , menó.';
}

$conn->close();
?>
