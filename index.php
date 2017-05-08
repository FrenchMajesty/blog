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
    $view->welcome = 'Welcome! Homepage of ' . $view->sitename;

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


$router->get('/staff',  function() use (&$view) {

    $view->title = 'Church staff';


    // Finalize page
    $view->content = $view->render('staff.php');
    echo $view->render('layout.php');
});

$router->get('/about',  function() use (&$view) {

    $view->title = 'About';


    // Finalize page
    $view->content = $view->render('about.php');
    echo $view->render('layout.php');
});

$router->get('/wall',  function() use (&$view) {

    $view->title = 'Prayer wall';


    // Finalize page
    $view->content = $view->render('wall.php');
    echo $view->render('layout.php');
});

$router->get('/contact',  function() use (&$view) {

    $view->title = 'Contact Us';


    // Finalize page
    $view->content = $view->render('contact.php');
    echo $view->render('layout.php');
});

$router->get('/sermons',  function() use (&$view) {

    $view->title = 'Sermons';


    // Finalize page
    $view->content = $view->render('sermons.php');
    echo $view->render('layout.php');
});

$router->get('/donations',  function() use (&$view) {

    $view->title = 'Donate';


    // Finalize page
    $view->content = $view->render('about.php');
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
