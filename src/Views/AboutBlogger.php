<?php
namespace Views;

use Core\Template;
use Core\Database;

use Model\User;
use Model\BlogPost;

class AboutBlogger extends Views {

    public function __construct(Template &$viewTemplate, User $user) {
        parent::__construct($viewTemplate);

        $this->view->blogger = $user;
        $this->view->user = $user;
    }

    public function init() {
        $this->view->pagename = "About";

        $db = new Database();

        $this->view->postCount = $db->getRowsCount('blogposts');

        $this->view->content = $this->view->render("about.php");
    }
}


?>
