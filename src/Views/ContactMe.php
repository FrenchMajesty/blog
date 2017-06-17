<?php
namespace Views;

use Core\Template;

use Model\User;

class ContactMe extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->user = $user;
    }

    public function init() {
        $this->view->pagename = "Contact Me";

        $this->view->content = $this->view->render("contact.php");
    }
}


?>
