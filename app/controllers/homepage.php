<?php

use App\QueryBuilder;
$db = new QueryBuilder();
//$posts = $db->getAll('posts');

//$db->insert([
//    'title' => 'new post from QueryFactory package'
//],'posts');

//$db->update([
//    'title' => 'new post from QueryFactory package-2'
//],23,'posts');

//$db->delete(23,'posts');

$post = $db->getOne(22, 'posts');

var_dump($post);

?>