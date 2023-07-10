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

// Consulta SQL para selecionar todos os candidatos, ordenados por salaprova e nome
$sql = 'SELECT nome, cpf, identidade, email, cargo_pretendido, salaprova FROM candidatos ORDER BY salaprova, nome';
$result = $conn->query($sql);

// Verificando se existem resultados da consulta
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Exibindo as informações dos candidatos
    echo 'Nome: ' . $row['nome'] . '<br>';
    echo 'CPF: ' . $row['cpf'] . '<br>';
    echo 'Identidade: ' . $row['identidade'] . '<br>';
    echo 'Email: ' . $row['email'] . '<br>';
    echo 'Cargo Pretendido: ' . $row['cargo_pretendido'] . '<br>';
    echo 'Sala de Prova: ' . $row['salaprova'] . '<br><br>';
  }
} else {
  echo 'Nenhum candidato encontrado, menó.';
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
