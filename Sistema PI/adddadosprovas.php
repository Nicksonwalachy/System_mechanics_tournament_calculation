<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/app.css">
    <script src="main.js" defer></script>
    <title>Document</title>
</head>
<body>

<h2>Selecione uma equipe e insira os dados</h2>

<form action="inseredadosdeprovas.php" method="post">
  <select name="equipe">
    <?php
    // Conectando ao banco de dados
    $conn = new mysqli('localhost', 'root', 'senha1', 'torneio');

    // Consulta SQL para buscar as equipes
    $sql = "SELECT id, nome_equipe FROM Equipe";
    $result = $conn->query($sql);

    // Criando uma opção de dropdown para cada equipe
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id'] . "'>" . $row['nome_equipe'] . "</option>";
    }

    // Fechando a conexão
    $conn->close();
    ?>
  </select>
  <br>
  Velocidade:<br>
  <input type="number" step="0.01" name="velocidade">
  <input class="btn btn-primary" type="submit" value="Enviar">
  <br>
  Tração:<br>
  <input type="number" step="0.01" name="tracao">
  <input class="btn btn-primary" type="submit" value="Enviar">
  <br>
  Rampa:<br>
  <input type="number" step="0.01" name="rampa">
  <input class="btn btn-primary" type="submit" value="Enviar">
  <br><br>
</form> 

</body>
</html>
