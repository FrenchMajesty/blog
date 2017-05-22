<?php
namespace Views;

use Core\Template;

class BloggerStory extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = "My Story";

        $this->view->content = $this->view->render("mystory.php");
    }
}


?>
