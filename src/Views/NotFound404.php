<?php
namespace Views;

use Core\Template;

class NotFound404 extends Views {

    public function __construct(Template &$viewTemplate) {

        parent::__construct($viewTemplate);
    }

    public function init() {
        $this->view->pagename = '404 Page Not Found';

        $this->view->content = $this->view->render('404.php');
    }

}

?>
