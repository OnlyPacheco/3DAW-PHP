<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php 

// Função para conectar ao banco de dados
function conectarBancoDados() {
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "seu_banco_de_dados";

    // Criar uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    return $conn;
}

// Função para criar uma pergunta de múltipla escolha no banco de dados
function criarPerguntaMultiplaEscolha($pergunta, $opcoes) {
    $conn = conectarBancoDados();

    $tipo = "multipla_escolha";
    $sql = "INSERT INTO perguntas (tipo, pergunta, opcoes) VALUES ('$tipo', '$pergunta', '$opcoes')";

    if ($conn->query($sql) === TRUE) {
        echo "Pergunta de múltipla escolha criada com sucesso.";
    } else {
        echo "Erro ao criar a pergunta de múltipla escolha: " . $conn->error;
    }

    $conn->close();
}

// Função para criar uma pergunta de texto no banco de dados
function criarPerguntaTexto($pergunta) {
    $conn = conectarBancoDados();

    $tipo = "texto";
    $sql = "INSERT INTO perguntas (tipo, pergunta) VALUES ('$tipo', '$pergunta')";

    if ($conn->query($sql) === TRUE) {
        echo "Pergunta de texto criada com sucesso.";
    } else {
        echo "Erro ao criar a pergunta de texto: " . $conn->error;
    }

    $conn->close();
}

function alterarPerguntaMultiplaEscolha($id, $pergunta, $opcoes) {
          $conn = conectarBancoDados();

          $sql = "UPDATE perguntas SET pergunta='$pergunta', opcoes='$opcoes' WHERE id=$id";

          if ($conn->query($sql) === TRUE) {
              echo "Pergunta de múltipla escolha alterada com sucesso.";
          } else {
              echo "Erro ao alterar a pergunta de múltipla escolha: " . $conn->error;
          }

          $conn->close();
      }

      // Função para alterar as respostas de uma pergunta de múltipla escolha no banco de dados
      function alterarRespostasMultiplaEscolha($id, $opcoes) {
          $conn = conectarBancoDados();

          $sql = "UPDATE perguntas SET opcoes='$opcoes' WHERE id=$id";

          if ($conn->query($sql) === TRUE) {
              echo "Respostas da pergunta de múltipla escolha alteradas com sucesso.";
          } else {
              echo "Erro ao alterar as respostas da pergunta de múltipla escolha: " . $conn->error;
          }

          $conn->close();
      }

      // Função para alterar uma pergunta de texto no banco de dados
      function alterarPerguntaTexto($id, $pergunta) {
          $conn = conectarBancoDados();

          $sql = "UPDATE perguntas SET pergunta='$pergunta' WHERE id=$id";

          if ($conn->query($sql) === TRUE) {
              echo "Pergunta de texto alterada com sucesso.";
          } else {
              echo "Erro ao alterar a pergunta de texto: " . $conn->error;
          }

          $conn->close();
      }

// Função para listar todas as perguntas e respostas do banco de dados
function listarPerguntasRespostas() {
    $conn = conectarBancoDados();

    $sql = "SELECT * FROM perguntas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Tipo: " . $row["tipo"] . "<br>";
            echo "Pergunta: " . $row["pergunta"] . "<br>";
            if ($row["tipo"] === "multipla_escolha") {
                echo "Opções: " . $row["opcoes"] . "<br>";
            }
            echo "<br>";
        }
    } else {
        echo "Nenhuma pergunta encontrada.";
    }

    $conn->close();
}

// Função para listar uma pergunta específica do banco de dados
function listarPergunta($id) {
    $conn = conectarBancoDados();

    $sql = "SELECT * FROM perguntas WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . "<br>";
            echo "Tipo: " . $row["tipo"] . "<br>";
            echo "Pergunta: " . $row["pergunta"] . "<br>";
            if ($row["tipo"] === "multipla_escolha") {
                echo "Opções: " . $row["opcoes"] . "<br>";
            }
            echo "<br>";
        }
    } else {
        echo "Pergunta não encontrada.";
    }

    $conn->close();
}

// Função para excluir uma pergunta e suas respostas do banco de dados
function excluirPerguntaRespostas($id) {
    $conn = conectarBancoDados();

    // Primeiro, exclua as respostas associadas à pergunta
    $sqlRespostas = "DELETE FROM respostas WHERE pergunta_id=$id";
    if ($conn->query($sqlRespostas) === TRUE) {
        // Em seguida, exclua a pergunta
        $sqlPergunta = "DELETE FROM perguntas WHERE id=$id";
        if ($conn->query($sqlPergunta) === TRUE) {
            echo "Pergunta e respostas excluídas com sucesso.";
        } else {
            echo "Erro ao excluir a pergunta: " . $conn->error;
        }
    } else {
        echo "Erro ao excluir as respostas: " . $conn->error;
    }

    $conn->close();
}

     
     ?> 

  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>