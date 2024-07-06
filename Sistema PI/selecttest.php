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

    
    $conn = new mysqli($host, $user, $pass, $db);


    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    
    $sql = "SELECT nome_equipe FROM Equipe";
    $result = $conn->query($sql);

    
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['nome_equipe'] . "'>" . $row['nome_equipe'] . "</option>";
    }


    $conn->close();
    ?>
  </select>
  <br><br>
  <input type="submit" value="Enviar">
</form> 

</body>
</html>
