<?php
    require_once 'inition.php';

    $emailId = isset($_GET['id']) ? (int) $_GET['id'] : null;

    if(empty($emailId)){
        echo 'O código do email para alteração está vazio';
        exit;
    }

    $pdo = connect(); //função que esta no arquivo fucntions.php

    $sql = 'SELECT email FROM cadastro WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $emailId, PDO::PARAM_INT);
    $stmt->execute();
    $response = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!is_array($response)){
        echo 'Nenhum email encontrado';
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="post">
        <input name="email" id="email" type="email" value="<?php echo $response['email']; ?>">
        <input type="hidden" name="id" value="<?php echo $emailId; ?>">
        <button type="submit">Editar</button>
    </form>
    <a href="list.php">Ver lista</a>
</body>
</html>



