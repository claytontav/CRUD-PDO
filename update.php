<?php
    require_once 'inition.php';

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    $pdo = connect(); //função que esta no arquivo fucntions.php

    $sql = 'UPDATE cadastro SET email = :email WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email);

    if($stmt->execute()){
        header('Location: list.php');
    }else{
        echo 'Ocorreu um erro na alteração do email';
        print_r($stmt->error_info());
    }



