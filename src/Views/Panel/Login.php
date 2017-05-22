<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

class Login extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);

    }

    public function init() {
        $this->view->pagename = 'Log in';

        echo $this->view->render('/panel/login.php');
    }

}

?>

