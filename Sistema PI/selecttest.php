<!DOCTYPE html>
<html>
<body>

<h2>Escolha uma equipe</h2>

<form action="processa_equipe.php" method="post">
  <select name="equipe">
    <?php
    $host = 'localhost';
    $db   = 'torneio';
    $user = 'root';
    $pass = 'senha1';

    // Conectando ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta SQL para buscar as equipes
    $sql = "SELECT nome_equipe FROM Equipe";
    $result = $conn->query($sql);

    // Criando uma opção de dropdown para cada equipe
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['nome_equipe'] . "'>" . $row['nome_equipe'] . "</option>";
    }

    // Fechando a conexão
    $conn->close();
    ?>
  </select>
  <br><br>
  <input type="submit" value="Enviar">
</form> 

</body>
</html>
