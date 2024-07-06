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
    
    $conexao = new PDO('mysql:host=localhost;dbname=torneio', 'root', 'senha1');

    
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $colunasvlcd =array( "velocidade");

    
    foreach ($colunasvlcd as $colunavlcd) {

        $sql = "SELECT nome_equipe, $colunavlcd FROM equipe ORDER BY $colunavlcd";

        
        $stmt = $conexao->prepare($sql);

        
        $stmt->execute();

        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        
        echo "Ranking $colunavlcd:<br>";
        $iv = 1;
        foreach($stmt->fetchAll() as $linha) {
            echo $iv . "º Equipe: " . $linha["nome_equipe"]. " - $colunavlcd: " . $linha[$colunavlcd] . "<br>";
            $iv++;
        }
        echo "<br>";
    }
    $colunas1 =array( "rampa");

    
    foreach ($colunas1 as $coluna1) {
        
        $sql = "SELECT nome_equipe, $coluna1 FROM equipe ORDER BY $coluna1 desc";


        $stmt = $conexao->prepare($sql);


        $stmt->execute();


        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        
        $ir = 1;
        foreach($stmt->fetchAll() as $linha) {
            echo $ir . "º Equipe: " . $linha["nome_equipe"]. " - $coluna1: " . $linha[$coluna1] . "<br>";
            $ir++;
        }
        echo "<br>";
        
    }
    $colunas2 =array( "tração");


    foreach ($colunas2 as $coluna2) {
        
        $sql = "SELECT nome_equipe, $coluna2 FROM equipe ORDER BY $coluna2 desc";

        
        $stmt = $conexao->prepare($sql);

        
        $stmt->execute();

        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        
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


$conexao = null;
?>  

<a class="btn btn-primary" href="index.php">Voltar</a>
</body>
</html>
