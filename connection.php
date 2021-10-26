<?php
try {
    $connection=new PDO('mysql:host=ec2-52-5-247-46.compute-1.amazonaws.com
;dbname=d72102pnmqif5r;','xfcktdsnifoglw','7aa63198b623a2a7f940b8f310f5c303789b8947bc13e36e94632902f280de99');
}catch (PDOException $exception){
    echo $exception->getMessage();
}
