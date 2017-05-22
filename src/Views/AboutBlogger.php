<?php
namespace Views;

use Core\Template;

class AboutBlogger extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = "About";

        $this->view->content = $this->view->render("about.php");
    }
}


?>
