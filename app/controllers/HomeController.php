<?php

namespace App\controllers;

use App\QueryBuilder;
use League\Plates\Engine;

//$db = new QueryBuilder();
//$posts = $db->getAll('posts');

//$db->insert([
//    'title' => 'new post from QueryFactory package'
//],'posts');

//$db->update([
//    'title' => 'new post from QueryFactory package-2'
//],23,'posts');

//$db->delete(23,'posts');

//$post = $db->getOne(22, 'posts');

//var_dump($post);

//lesson route-2
class HomeController {

    private $templates;

    public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }

    public function index($vars)

    {
        // Create new Plates instance
//        $templates = new Engine('../app/views');

        // Render a template
        echo $this->templates->render('homepage', ['name' => 'Jonathan']);

//        d($vars); exit();
//        $db = new QueryBuilder();

//        $db->update([
//            'title' => 'new post from QueryFactory package2'
//        ], 2, 'posts');


    }

    public function about($vars)
    {
//        d($vars);

        // Create new Plates instance
//        $templates = new Engine('../app/views');

        // Render a template
        echo $this->templates->render('about', ['name' => 'This page about Jonathan']);
    }
}

?>