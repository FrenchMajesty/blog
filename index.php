<?php
/// Code by Verdi.K
///
/// 2017 Copyright All rights reserved.

require_once("./config.php");
require_once("./session.php");

$router = new Core\Router();
$request = new Core\Request();
$view = new Core\Template();
$events = new Core\EventManager();

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

$router->get('/login', function() use (&$view, &$user) {

    $page = new Views\Panel\Login($view, $user);
    $page->init();
});


$router->post('/login', function() use (&$user) {

    $controller = new Controller\UserController($user);

    if($controller->login())
        echo 'true';
    else
        echo json_encode($controller->dispatchErrors());
});



// ---------------------------
/*****************************

      ADMIN PANEL ROUTES

 ****************************/
// ---------------------------


 $router->before('GET|POST', '((panel)/?.*)', function() use (&$view, &$user) {
        // Logged in Middleware

        if($user->isLoggedIn())
            $user->loadFromSession();
        else
            $user->redirectTo('/blog/login');
    });

$router->mount('/panel', function() use ($router, &$view, &$user) {




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


    $router->post('/add/post', function() use (&$user) {

        $controller = new Controller\BlogPostController($user);

        if($controller->createPost()){
            echo json_encode([
                "success" => true,
                "message" => $controller->successMessage('Your publication has been posted.') ]);

        }else {
            echo json_encode([
                "success" => false,
                "message" => $controller->dispatchErrors() ]);
        }
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


    $router->get('/logout', function() use (&$user) {

        $user->logout();
        $user->redirectTo('/blog/');
    });


});


$router->run();
?>
