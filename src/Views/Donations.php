<?php
namespace Views;

use Core\Template;

class Donations extends Views {
    private $view;

    public function __construct(Template &$viewTemplate) {

        $this->view = $viewTemplate;
    }

    public function init() {
        $this->view->title = 'Donations';
        $this->view->content = $this->view->render('donations.php');
    }

}

?>
