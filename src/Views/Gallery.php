<?php
namespace Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;
use Model\User;

class Gallery extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->user = $user;
    }

    public function init() {
        $this->view->pagename = "Gallery Feed";

        $blog = new BlogPost(new Database());

        $this->view->galleryPosts = $blog->loadAllGallery();

        $this->view->content = $this->view->render("gallery.php");
    }
}


?>
