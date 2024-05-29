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

// Dados a serem inseridos
$nome_equipe = $_POST['nome_equipe'];
$numero_carro = $_POST['numero_carro'];

// Preparando a consulta SQL
$stmt = $conn->prepare("INSERT INTO Equipe (nome_equipe, numero_carro) VALUES (?, ?)");
$stmt->bind_param("si", $nome_equipe, $numero_carro);

// Executando a consulta
if ($stmt->execute()) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechando a conexão
$conn->close();
?>