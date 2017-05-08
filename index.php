<?php
/// Code by Verdi.K
///
/// 2017 Copyright All rights reserved.

require_once("./config.php");
require_once("./session.php");

$router = new Core\Router();
$request = new Core\Request();

$view = new Core\Template();

$view->sitename = $sitename;
$view->sitelink = $sitelink;


$router->get('/', function() use (&$view) {

    $view->title = 'Home';
    $view->welcome = 'Welcome to the blog: ' . $view->sitename;

    // Finalize page
    $view->content = $view->render('home.php');
    echo $view->render('layout.php');

});

/*
$router->get('/about',  function() use (&$view) {

    $view->title = 'About';


    // Finalize page
    $view->content = $view->render('about.php');
    echo $view->render('layout.php');
});


$router->get('/gallery',  function() use (&$view) {

    $view->title = 'Gallery';


    // Finalize page
    $view->content = $view->render('gallery.php');
    echo $view->render('layout.php');
});

$router->get('/article',  function() use (&$view) {

    $view->title = 'View a product/article';


    // Finalize page
    $view->content = $view->render('article.php');
    echo $view->render('layout.php');
});


*/


$router->get('/contact', function() {
   echo 'Contact page';
});


/**********************
      ADMIN PANEL
**********************/

$router->group('admin', function($r) {

    $r->get('/login', function() {
        echo 'Admin panel login page';
    });

    /*

    */

});

$router->run();
?>
