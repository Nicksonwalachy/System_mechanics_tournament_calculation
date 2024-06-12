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
    <title>Document</title>
</head>
<body>
        <?php
try {
    // Conecte-se ao banco de dados
    $conexao = new PDO('mysql:host=localhost;dbname=torneio', 'root', 'senha1');

    // Defina o modo de erro do PDO para exceção
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crie um array para armazenar os rankings
    $colunasvlcd =array( "velocidade");

    // Percorra cada coluna e crie um ranking
    foreach ($colunasvlcd as $colunavlcd) {
        // Crie a consulta SQL
        $sql = "SELECT nome_equipe, $colunavlcd FROM equipe ORDER BY $colunavlcd";

        // Prepare a declaração SQL
        $stmt = $conexao->prepare($sql);

        // Execute a declaração
        $stmt->execute();

        // Defina o modo de busca para associativo
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Exiba cada linha de resultado
        echo "Ranking $colunavlcd:<br>";
        $iv = 1;
        foreach($stmt->fetchAll() as $linha) {
            echo $iv . "º Equipe: " . $linha["nome_equipe"]. " - $colunavlcd: " . $linha[$colunavlcd] . "<br>";
            $iv++;
        }
        echo "<br>";
    }
    $colunas1 =array( "rampa");

    // Percorra cada coluna e crie um ranking
    foreach ($colunas1 as $coluna1) {
        // Crie a consulta SQL
        $sql = "SELECT nome_equipe, $coluna1 FROM equipe ORDER BY $coluna1 desc";

        // Prepare a declaração SQL
        $stmt = $conexao->prepare($sql);

        // Execute a declaração
        $stmt->execute();

        // Defina o modo de busca para associativo
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Exiba cada linha de resultado
        $ir = 1;
        foreach($stmt->fetchAll() as $linha) {
            echo $ir . "º Equipe: " . $linha["nome_equipe"]. " - $coluna1: " . $linha[$coluna1] . "<br>";
            $ir++;
        }
        echo "<br>";
        
    }
    $colunas2 =array( "tração");

    // Percorra cada coluna e crie um ranking
    foreach ($colunas2 as $coluna2) {
        // Crie a consulta SQL
        $sql = "SELECT nome_equipe, $coluna2 FROM equipe ORDER BY $coluna2";

        // Prepare a declaração SQL
        $stmt = $conexao->prepare($sql);

        // Execute a declaração
        $stmt->execute();

        // Defina o modo de busca para associativo
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Exiba cada linha de resultado
        echo "Ranking da coluna $coluna2:<br>";
        $it = 1;
foreach($stmt->fetchAll() as $linha) {
    echo $it . "º Equipe: " . $linha["nome_equipe"]. " - $coluna2: " . $linha[$coluna2] . "<br>";
    $it++;
}
echo "<br>";

    }
}
catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Feche a conexão
$conexao = null;
?>  

<a class="btn btn-primary" href="index.php">Voltar</a>
</body>
</html>
