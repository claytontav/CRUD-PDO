<?php
    require_once 'inition.php'; 
    $pdo = connect(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $stmt = $pdo->prepare('SELECT * FROM cadastro');
        $stmt->execute();


        while($response = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<div>';
            echo '<p>'.$response['email'].'</p>';
            echo '<a href="updateForm.php?id='.$response['id'].'">editar</a>';
            echo '<br />';
            echo '<a href="#" onclick="alert('.$response['id'].')">Excluir</a>';
            echo '</div>';
        }
    ?>

    <script>
        function alert(id){
            var res = confirm('Tem certeza que deseja excluir?');

            if(res == true){
                window.location.href = "delete.php?id="+id;
            }
        }
    </script>
</body>
</html>