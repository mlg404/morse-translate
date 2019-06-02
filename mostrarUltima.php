<?php
  include("./config.php");
  $palavra = $pdo->query("SELECT * FROM palavra ORDER BY id DESC LIMIT 1");
  $palavra->execute();
  while($palavra2 = $palavra->fetch(PDO::FETCH_ASSOC)){
    echo  $palavra2['morse'];
  }
?>
