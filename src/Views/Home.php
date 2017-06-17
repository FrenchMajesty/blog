<?php
namespace Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;
use Model\User;

class Home extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {

        parent::__construct($viewTemplate);

        $this->view->user = $user;
    }

    public function init() {
        $this->view->pagename = 'Home';

        $blog = new BlogPost(new Database());

        $this->view->posts = $blog->loadAllPosts();

        $this->view->content = $this->view->render('home.php');
    }

}

?>
