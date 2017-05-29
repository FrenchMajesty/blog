<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

use Model\BlogPost;
use Model\User;

class EditPost extends Views {

    public function __construct(Template &$viewTemplate, User &$user, BlogPost &$post) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
        $this->view->post = $post;
    }

    public function init() {
        $this->view->pagename = 'Edit publication';


        $this->view->editPostToken = BlogPost::generateFormToken('editPost');

        $this->view->content = $this->view->render('/panel/edit-post.php');
    }

}

?>
