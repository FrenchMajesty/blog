<?php
namespace Views;

use Core\Template;

class ContactMe extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = "Contact Me";

        $this->view->content = $this->view->render("contact.php");
    }
}


?>
