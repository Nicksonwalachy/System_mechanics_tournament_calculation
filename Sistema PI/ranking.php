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

// Consulta SQL para buscar as equipes e somar as notas
$sql = "SELECT nome_equipe, (Velocidade + Tração + Rampa) AS Total FROM Equipe ORDER BY Total DESC";
$result = $conn->query($sql);

// Iniciando a tabela HTML
echo "<table border='1º'>";
echo "<tr><th>Equipe</th><th>Total</th></tr>";

// Preenchendo a tabela com os dados
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['nome_equipe'] . "</td><td>" . $row['Total'] . "</td></tr>";
}

// Finalizando a tabela HTML
echo "</table>";

// Fechando a conexão
$conn->close();
?>
