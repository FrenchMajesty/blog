<?php
namespace Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;

class Gallery extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = "Gallery Feed";

        $blog = new BlogPost(new Database());

        $this->view->galleryPosts = $blog->loadAllGallery();

        $this->view->content = $this->view->render("gallery.php");
    }
}


?>
