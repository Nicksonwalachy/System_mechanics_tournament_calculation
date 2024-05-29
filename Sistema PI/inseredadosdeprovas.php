<?php
// Conectando ao banco de dados
$conn = new mysqli('localhost', 'root', 'senha1', 'torneio');

// Dados a serem inseridos
$id_equipe = $_POST['equipe'];
$velocidade = $_POST['velocidade'];
$tracao = $_POST['tracao'];
$rampa = $_POST['rampa'];

// Preparando a consulta SQL
$stmt = $conn->prepare("UPDATE Equipe SET velocidade = ?, tração = ?, rampa = ? WHERE id = ?");
$stmt->bind_param("iiii", $velocidade, $tracao, $rampa, $id_equipe);

// Executando a consulta
if ($stmt->execute()) {
    echo "Dados adicionados com sucesso à equipe selecionada";
} else {
    echo "Erro: " . $stmt->error;
}

// Fechando a conexão
$conn->close();
?>
