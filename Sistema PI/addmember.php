<?php
// Substitua com a sua conexão ao banco de dados
$conn = mysqli_connect('localhost', 'root', 'senha1', 'torneio');

// Verificar conexão
if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}

// Recuperar os valores do formulário
$nome = $_POST['nome'];
$id_equipe = $_POST['equipe'];

// Preparar a consulta SQL
$sql = "INSERT INTO integrantes_equipe (nome, id_equipe) VALUES (?, ?)";

// Preparar a declaração
$stmt = mysqli_prepare($conn, $sql);

// Vincular os parâmetros
mysqli_stmt_bind_param($stmt, 'si', $nome, $id_equipe);

// Executar a declaração
if (mysqli_stmt_execute($stmt)) {
  echo "Novo integrante adicionado com sucesso!";
} else {
  echo "Erro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
