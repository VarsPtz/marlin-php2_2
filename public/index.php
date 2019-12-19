<?php

require '../vendor/autoload.php';

use Aura\SqlQuery\QueryFactory;

$queryFactory = new QueryFactory('app3');

var_dump($queryFactory);

//$select = $queryFactory->newSelect();
//$select->cols(['*'])
//    ->from('posts');
//
//var_dump($select->getStatement());die;


// a PDO connection
//$pdo = new PDO(...);

// prepare the statment
//$sth = $pdo->prepare($select->getStatement());

// bind the values and execute
//$sth->execute($select->getBindValues());

// get the results back as an associative array
//$result = $sth->fetch(PDO::FETCH_ASSOC);

//var_dump($select);
echo 123;

?>