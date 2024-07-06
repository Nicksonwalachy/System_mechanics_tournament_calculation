<?php

$conn = mysqli_connect('localhost', 'root', 'senha1', 'torneio');


if (!$conn) {
  die("Falha na conexão: " . mysqli_connect_error());
}


$nome = $_POST['nome'];
$id_equipe = $_POST['equipe'];


$sql = "INSERT INTO integrantes_equipe (nome, id_equipe) VALUES (?, ?)";


$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param($stmt, 'si', $nome, $id_equipe);


if (mysqli_stmt_execute($stmt)) {
  echo "Novo integrante adicionado com sucesso!";
} else {
  echo "Erro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
