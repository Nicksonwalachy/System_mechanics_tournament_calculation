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
<header class="flex align-center justify-between">
            <H1>Programa de calculos PI</H1>
            <button id="themeSwitcher" class="btn-primary">Switch Theme Dark/Light</button>  
        </header>
        <?php
try {
    // Conecte-se ao banco de dados
    $conexao = new PDO('mysql:host=localhost;dbname=torneio', 'root', 'senha1');

    // Defina o modo de erro do PDO para exceção
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crie um array para armazenar os rankings
    $colunas = array("velocidade", "tração", "rampa");

    // Percorra cada coluna e crie um ranking
    foreach ($colunas as $coluna) {
        // Crie a consulta SQL
        $sql = "SELECT nome_equipe, $coluna FROM equipe ORDER BY $coluna";

        // Prepare a declaração SQL
        $stmt = $conexao->prepare($sql);

        // Execute a declaração
        $stmt->execute();

        // Defina o modo de busca para associativo
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Exiba cada linha de resultado
        echo "Ranking da coluna $coluna:<br>";
        foreach($stmt->fetchAll() as $linha) {
            echo "Equipe: " . $linha["nome_equipe"]. " - $coluna: " . $linha[$coluna]. "<br>";
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
