// Função para criar perguntas e respostas de múltipla escolha
function createMultipleChoiceQuestion() {
  var question = document.getElementById("question-mc").value;
  var options = document.getElementById("options").value.split(",");
  var correctAnswer = document.querySelector('input[name="correct-answer"]:checked').value;

  // Criar objeto com a pergunta e respostas
  var questionData = {
    question: question,
    options: options,
    correctAnswer: correctAnswer
  };

  // Salvar a pergunta e respostas em um arquivo ou banco de dados
  // Exemplo de código para salvar em um arquivo usando File System API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    var file = new File([JSON.stringify(questionData)], "pergunta_mc.txt", {type: "text/plain"});
    var reader = new FileReader();

    reader.onloadend = function () {
      console.log("Pergunta e respostas de múltipla escolha criadas com sucesso!");
    };

    reader.readAsDataURL(file);
  } else {
    console.log("A API de File System não é suportada neste navegador.");
  }

  // Limpar campos de entrada
  document.getElementById("question-mc").value = "";
  document.getElementById("options").value = "";
}

// Função para criar perguntas e respostas de texto
function createTextQuestion() {
  var question = document.getElementById("question-text").value;
  var correctAnswer = document.getElementById("answer-text").value;

  // Criar objeto com a pergunta e resposta
  var questionData = {
    question: question,
    answer: correctAnswer
  };

  // Salvar a pergunta e resposta em um arquivo ou banco de dados
  // Exemplo de código para salvar em um arquivo usando File System API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    var file = new File([JSON.stringify(questionData)], "pergunta_texto.txt", {type: "text/plain"});
    var reader = new FileReader();

    reader.onloadend = function () {
      console.log("Pergunta e resposta de texto criadas com sucesso!");
    };

    reader.readAsDataURL(file);
  } else {
    console.log("A API de File System não é suportada neste navegador.");
  }

  // Limpar campos de entrada
  document.getElementById("question-text").value = "";
  document.getElementById("answer-text").value = "";
}

// Função para listar todas as perguntas e respostas
function listQuestions() {
  // Ler arquivos contendo as perguntas e respostas
  // Exemplo de código para ler arquivos usando File System API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    var files = ["pergunta_mc.txt", "pergunta_texto.txt"];

    files.forEach(function (fileName) {
      var reader = new FileReader();

      reader.onloadend = function () {
        var questionData = JSON.parse(reader.result);

        // Exibir pergunta e resposta
        console.log("Pergunta:", questionData.question);

        if (questionData.options) {
          console.log("Opções:", questionData.options);
          console.log("Resposta correta:", questionData.correctAnswer);
        } else {
          console.log("Resposta:", questionData.answer);
        }
      };

      reader.readAsText(fileName);
    });
  } else {
    console.log("A API de File System não é suportada neste navegador.");
  }
}

// Função para alterar perguntas e respostas de múltipla escolha
function updateMultipleChoiceQuestion() {
  var questionId = document.getElementById("question-id-mc").value;
  var newQuestion = document.getElementById("new-question-mc").value;
  var newOptions = document.getElementById("new-options").value.split(",");
  var newCorrectAnswer = document.querySelector('input[name="new-correct-answer"]:checked').value;

  // Criar objeto com a nova pergunta e respostas
  var updatedQuestionData = {
    question: newQuestion,
    options: newOptions,
    correctAnswer: newCorrectAnswer
  };

  // Atualizar a pergunta e respostas no arquivo usando File System API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    var fileName = questionId + ".txt";

    // Verificar se o arquivo existe antes de atualizar
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", fileName, false);
    xhr.send();

    if (xhr.status == "200") {
      // O arquivo existe, então pode ser atualizado
      var file = new File([JSON.stringify(updatedQuestionData)], fileName, {type: "text/plain"});

      var reader = new FileReader();

      reader.onloadend = function () {
        console.log("Pergunta e respostas de múltipla escolha atualizadas com sucesso!");
      };

      reader.readAsDataURL(file);
    } else {
      console.log("A pergunta não existe.");
    }
  } else {
    console.log("A API de File System não é suportada neste navegador.");
  }

  // Limpar campos de entrada
  document.getElementById("question-id-mc").value = "";
  document.getElementById("new-question-mc").value = "";
  document.getElementById("new-options").value = "";
}

// Função para alterar perguntas com respostas de texto
function updateTextQuestion() {
  var questionId = document.getElementById("question-id-text").value;
  var newQuestion = document.getElementById("new-question-text").value;
  var newAnswer = document.getElementById("new-answer-text").value;

  // Criar objeto com a nova pergunta e resposta
  var updatedQuestionData = {
    question: newQuestion,
    answer: newAnswer
  };

  // Atualizar a pergunta e resposta no arquivo usando File System API
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    var fileName = questionId + ".txt";

    // Verificar se o arquivo existe antes de atualizar
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", fileName, false);
    xhr.send();

    if (xhr.status == "200") {
      // O arquivo existe, então pode ser atualizado
      var file = new File([JSON.stringify(updatedQuestionData)], fileName, {type: "text/plain"});

      var reader = new FileReader();

      reader.onloadend = function () {
        console.log("Pergunta e resposta de texto atualizadas com sucesso!");
      };

      reader.readAsDataURL(file);
    } else {
      console.log("A pergunta não existe.");
    }
  } else {
    console.log("A API de File System não é suportada neste navegador.");
  }

  // Limpar campos de entrada
  document.getElementById("question-id-text").value = "";
  document.getElementById("new-question-text").value = "";
  document.getElementById("new-answer-text").value = "";
}
