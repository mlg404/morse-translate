<?php
    include("./config.php");
    $morse = $_POST['morse'];
    $palavra = $pdo->prepare("INSERT INTO palavra (morse) VALUES (:morse)");
    $palavra->bindParam(':morse', $morse);
    $palavra->execute();
    echo $morse;
?>
