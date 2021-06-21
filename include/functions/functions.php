<?php
function redirectHome($theMsg, $seconds = 3){

    $url  = 'index.php';
    $link = 'HomePage';

  echo "<div class='alert alert-info'>$theMsg <br />You will be redirected to $link after $seconds Seconds.</div>";
  header("refresh: $seconds;url=$url");
  exit();

}
