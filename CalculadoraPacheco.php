<!DOCTYPE html>
<html>
  <head>
    <title>Calculadora PHP com AJAX</title>
    <style>
      /* Estilos para os botões */
      button {
        font-size: 20px;
        padding: 10px;
        width: 50px;
        height: 50px;
        margin: 5px;
      }
      
      /* Estilos para a tela de exibição */
      #display {
        font-size: 30px;
        width: 200px;
        height: 50px;
        margin-bottom: 10px;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        // Função para enviar o formulário via AJAX
        $("form").submit(function(e) {
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: "calc.php",
            data: $(this).serialize(),
            success: function(response) {
              $("#result").html(response);
            }
          });
        });
      });
    </script>
  </head>
  <body>
    <!-- Formulário para a calculadora -->
    <form>
      <input type="text" name="num1" id="num1" />
      <input type="text" name="num2" id="num2" />
      <br />
      <button type="button" name="operator" value="+" onclick="sendForm('+')">+</button>
      <button type="button" name="operator" value="-" onclick="sendForm('-')">-</button>
      <button type="button" name="operator" value="*" onclick="sendForm('*')">*</button>
      <button type="button" name="operator" value="/" onclick="sendForm('/')">/</button>
      <button type="button" name="operator" value="√" onclick="sendForm('√')">√</button>
      <button type="button" name="operator" value="^" onclick="sendForm('^')">^</button>
      <button type="button" name="operator" value="sen" onclick="sendForm('sen')">sen</button>
      <button type="button" name="operator" value="cos" onclick="sendForm('cos')">cos</button>
      <button type="button" name="operator" value="tan" onclick="sendForm('tan')">tan</button>
    </form>
    
    <!-- Tela de exibição do resultado -->
    <div id="result"></div>
    
    <script>
      function sendForm(operator) {
        // Adiciona o operador ao formulário antes de enviá-lo via AJAX
        $("#operator").val(operator);
        $("form").submit();
      }
    </script>
  </body>
</html>

