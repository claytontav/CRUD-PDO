<?php
    require_once 'inition.php';

    $email = isset($_POST['email']) ? $_POST['email'] : null;

    $pdo = connect(); //função que esta no arquivo fucntions.php

    $sql = 'INSERT INTO cadastro (email) VALUES (:email)';

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':email', $email);

    if($stmt->execute()){
        header('Location: index.html');
    }else{
        echo 'Ocorreu um erro na inclusão de registro';
        print_r($stmt->errorInfo());
    }

