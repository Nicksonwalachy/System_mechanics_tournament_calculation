<!DOCTYPE html>
<html>
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
  <input type="number" name="velocidade">
  <br>
  Tração:<br>
  <input type="number" name="tracao">
  <br>
  Rampa:<br>
  <input type="number" name="rampa">
  <br><br>
  <input type="submit" value="Enviar">
</form> 

</body>
</html>
