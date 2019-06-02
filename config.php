<?php
    header('Access-Control-Allow-Credentials: true');
    header('Connection: keep-alive');
    /*header('content-type: application/json; charset=utf-8');*/ 
    //no arduino eu precisava da resposta como json. Pra web, tanto faz

    define( 'MYSQL_HOST', 'localhost' );
    define( 'MYSQL_USER', 'root' );
    define( 'MYSQL_PASSWORD', '' );
    define( 'MYSQL_DB_NAME', 'morse' );
    try{
    $pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
    } catch ( PDOException $e ) {
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
?>