<?php
namespace Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;

class Home extends Views {

    public function __construct(Template &$viewTemplate) {

        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = 'Home';

        $blog = new BlogPost(new Database());

        $this->view->posts = $blog->loadAllPosts();

        $this->view->content = $this->view->render('home.php');
    }

}

?>
