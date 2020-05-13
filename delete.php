<?php
    require_once 'inition.php';

    $emailId = isset($_GET['id']) ? $_GET['id'] : null;

    if(empty($emailId)){
        echo 'O código do email para exclusão não foi definido';
        exit;
    }

    $pdo = connect();

    $sql = 'DELETE FROM cadastro WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $emailId, PDO::PARAM_INT);
    if($stmt->execute()){
        header('Location: list.php');
    }else{
        echo 'Ocorreu um erro ao excluir o livro';
        print_r($stmt->errorInfo());
    }