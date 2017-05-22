<?php
namespace Views;

use Core\Template;

class Gallery extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = "Gallery Feed";

        $this->view->content = $this->view->render("gallery.php");
    }
}


?>
