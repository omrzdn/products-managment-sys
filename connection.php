<?php
try {
    $connection=new PDO('mysql:host=localhost;dbname=vendor;','root','');
}catch (PDOException $exception){
    echo $exception->getMessage();
}
