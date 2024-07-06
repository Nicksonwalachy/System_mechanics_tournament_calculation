<!DOCTYPE html>
<html lang="pt-br">

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
</head>
<body>
<?php

$conn = new mysqli('localhost', 'root', 'senha1', 'torneio');


$id_equipe = $_POST['equipe'];
$floatv = floatval($inputvelocidade = $_POST['velocidade']);
$tracao = $_POST['tracao'];
$rampa = $_POST['rampa'];
$float= floatval($punicao = $_POST['pvelocidade']) ;
$velocidade = $float + $floatv;


if($velocidade != null){
$stmt = $conn->prepare("UPDATE Equipe SET velocidade = ? WHERE id = ?");
$stmt->bind_param("di", $velocidade, $id_equipe);



if ($stmt->execute()) {
    echo "Dados adicionados com sucesso à equipe selecionada";
} else {
    echo "Erro: " . $stmt->error;
}
}

if($tracao != null){
$stmt1 = $conn->prepare("UPDATE Equipe SET tração = ? WHERE id = ?");
$stmt1->bind_param("di", $tracao, $id_equipe);


if ($stmt1->execute()) {
    echo "Dados adicionados com sucesso à equipe selecionada";
} else {
    echo "Erro: " . $stmt2->error;
}
}

if($rampa != null){
$stmt2 = $conn->prepare("UPDATE Equipe SET rampa = ? WHERE id = ?");
$stmt2->bind_param("di", $rampa, $id_equipe);


if ($stmt2->execute()) {
    echo "Dados adicionados com sucesso à equipe selecionada";
} else {
    echo "Erro: " . $stmt2->error;}
}



$conn->close();
?>
<br>
<a class="btn btn-primary" href="index.php">Voltar</a>
</body>
</html>