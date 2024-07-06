<?php
$host = 'localhost';
$db   = 'torneio';
$user = 'root';
$pass = 'senha1';


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$nome_equipe = $_POST['nome_equipe'];
$numero_carro = $_POST['numero_carro'];


$stmt = $conn->prepare("INSERT INTO Equipe (nome_equipe, numero_carro) VALUES (?, ?)");
$stmt->bind_param("si", $nome_equipe, $numero_carro);


if ($stmt->execute()) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $stmt->error;
}


$conn->close();
?>