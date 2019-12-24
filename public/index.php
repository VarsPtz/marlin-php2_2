<?php

require "../vendor/autoload.php";



//use App\QueryBuilder;
//
//$db = new QueryBuilder();
//
//var_dump($db);



if ($_SERVER["REQUEST_URI"] == "/home") {
    require "../app/controllers/homepage.php";
}

exit;

?>