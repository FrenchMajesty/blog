<?php
namespace Views;

use Core\Template;

use Model\User;

class BloggerStory extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->blogger = $user;
        $this->view->user = $user;
    }

    public function init() {
        $this->view->pagename = "My Story";

        $this->view->content = $this->view->render("mystory.php");
    }
}


?>
