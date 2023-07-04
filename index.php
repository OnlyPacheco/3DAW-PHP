<!DOCTYPE html>
<html>
<head>
  <title>Gerenciamento de Candidatos</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .menu {
      background-color: #222;
      padding: 10px;
      text-align: center;
    }

    .menu a {
      color: #fff;
      text-decoration: none;
      margin-right: 20px;
      font-weight: bold;
    }

    .content {
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    h2 {
      margin-top: 30px;
    }

    button {
      padding: 10px;
      background-color: #222;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    form {
      margin-top: 10px;
    }

    label {
      display: inline-block;
      width: 150px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    input[type="number"],
    input[type="text"] {
      padding: 8px;
      border: 1px solid #555;
      border-radius: 4px;
      box-sizing: border-box;
      width: 250px;
      margin-bottom: 10px;
      background-color: #222;
      color: #fff;
    }

    input[type="submit"] {
      background-color: #222;
      color: #fff;
      padding: 10px;
      border: none;
      cursor: pointer;
    }

    #resultado {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Gerenciamento de Candidatos</h1>
  </div>

  <div class="menu">
    <a href="#">Listar Candidatos</a>
    <a href="#">Incluir Fiscais de Prova</a>
    <a href="#">Alterar Sala de Prova</a>
  </div>

  <div class="content">
    <h2>Listar Candidatos Presentes</h2>
    <button>Listar Candidatos</button>
    <div id="resultado"></div>

    <h2>Incluir Fiscais de Prova</h2>
    <form id="formIncluirFiscais" action="incluirfiscaisAV2.php" method="POST">
      <label for="sala">Insira a sala de Prova:</label>
      <input type="number" name="sala" required>
      <br>
      <label for="fiscal1">CPF do primeiro fiscal:</label>
      <input type="text" name="fiscal1" required>
      <br>
      <label for="fiscal2">CPF do segundo fiscal:</label>
      <input type="text" name="fiscal2" required>
      <br>
      <input type="submit" value="Incluir Fiscais Agora">
    </form>

    <h2>Alterar Sala de Prova</h2>
    <form id="formAlterarSala" action="alterarsalaAV2.php" method="POST">
      <label for="cpf">CPF do Candidato:</label>
      <input type="text" name="cpf" required>
      <br>
      <label for="novaSala">Insira a nova sala da prova:</label>
      <input type="number" name="novaSala" required>
      <br>
      <input type="submit" value="Alterar Sala Agora">
    </form>
  </div>
  <script>
    
   document.addEventListener('DOMContentLoaded', function() {
      var btnListarCandidatos = document.getElementById('btnListarCandidatos');
      var formIncluirFiscais = document.getElementById('formIncluirFiscais');
      var formAlterarSala = document.getElementById('formAlterarSala');
      var resultado = document.getElementById('resultado');

      if (btnListarCandidatos) {
        btnListarCandidatos.addEventListener('click', function() {
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              resultado.innerHTML = xhr.responseText;
            }
          };
          xhr.open('GET', 'listarcandidatosAV2.php', true);
          xhr.send();
        });
      }

      if (formIncluirFiscais) {
        formIncluirFiscais.addEventListener('submit', function(e) {
          e.preventDefault();
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              alert(xhr.responseText);
            }
          };
          xhr.open(formIncluirFiscais.method, formIncluirFiscais.action, true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send(new FormData(formIncluirFiscais));
        });
      }

      if (formAlterarSala) {
        formAlterarSala.addEventListener('submit', function(e) {
          e.preventDefault();
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              alert(xhr.responseText);
            }
          };
          xhr.open(formAlterarSala.method, formAlterarSala.action, true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.send(new FormData(formAlterarSala));
        });
      }
    });
  </script>
</body>
</html>
