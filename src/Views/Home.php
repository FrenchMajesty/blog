<?php
namespace Views;

use Core\Template;

class Home extends Views {

    public function __construct(Template &$viewTemplate) {

        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = 'Home';

        $this->view->content = $this->view->render('home.php');
    }

}

?>
