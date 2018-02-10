<?php
define("DSN","mysql:host=localhost;dbname=twitty");
define("USER","root");
define("PASS","");

try {
$pdo =  new PDO(DSN,USER,PASS);

}catch(PDOException $e) {
    echo "Connection error ".$e->getMessage();

}
