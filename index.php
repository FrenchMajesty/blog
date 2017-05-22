<?php
/// Code by Verdi.K
///
/// 2017 Copyright All rights reserved.

require_once("./config.php");
require_once("./session.php");

$router = new Core\Router();
$request = new Core\Request();
$view = new Core\Template();

$user = new Model\User($Database);

// Views Globals
$view->sitename = $sitename;
$view->sitelink = $sitelink;
$view->blogger = $bloggerName;


$router->get('/', function() use (&$view) {

    $page = new Views\Home($view);
    $page->init();

    echo $view->render('layout.php');
});


$router->get('/gallery', function() use (&$view) {

    $page = new Views\Gallery($view);
    $page->init();

    echo $view->render('layout.php');
});


$router->get('/contact', function() use (&$view) {

    $page = new Views\ContactMe($view);
    $page->init();

    echo $view->render('layout.php');
});


$router->get('/about', function() use (&$view) {

    $page = new Views\AboutBlogger($view);
    $page->init();

    echo $view->render('layout.php');
});


$router->get('/story', function() use (&$view) {

    $page = new Views\BloggerStory($view);
    $page->init();

    echo $view->render('layout.php');
});



// ---------------------------
/*****************************

      ADMIN PANEL ROUTES

 ****************************/
// ---------------------------


$router->mount('/panel', function() use ($router, &$view, &$user) {


    $router->get('/login', function() use (&$view) {

        $page = new Views\Panel\Login($view);
        $page->init();
    });


    $router->before('GET|POST', '(/?.*)', function() use (&$view, &$user) {
        // Logged in Middleware

        if(10 > 4) echo "middleware";
    });

    // *** PAGES WHERE LOGIN IS REQUIRED BELOW ***/


    $router->get('/', function() use (&$view, &$user) {

        $page = new Views\Panel\Dashboard($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/stats', function() use (&$view, &$user) {

       $page = new Views\Panel\Stats($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/feed', function() use (&$view) {

       $page = new Views\Home($view);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/gallery', function() use (&$view) {

        $page = new Views\Gallery($view);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/feed/edit', function() use (&$view, &$user) {

        $page = new Views\Panel\FeedManager($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/gallery/edit', function() use (&$view, &$user) {

        $page = new Views\Panel\GalleryManager($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/add/post', function() use (&$view, &$user) {

        $page = new Views\Panel\CreatePost($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/contacts', function() use (&$view, &$user) {

        $page = new Views\Panel\ContactBlogger($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/my-details', function() use (&$view, &$user) {

        $page = new Views\Panel\BloggerDetails($view, $user);
        $page->init();

        echo $view->render('panel.php');
    });


    $router->get('/gallery', function() use (&$view) {

        $page = new Views\Gallery($view);
        $page->init();

        echo $view->render('panel.php');
    });


});


$router->run();
?>
