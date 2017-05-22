<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

use Model\User;

class CreatePost extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'Add a post';

        $this->view->content = $this->view->render('/panel/create-post.php');
    }

}

?>
