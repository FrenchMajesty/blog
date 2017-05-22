<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

class Stats extends Views {

    public function __construct(Template &$viewTemplate) {
        parent::__construct($viewTemplate);

    }

    public function init() {
        $this->view->pagename = 'Statistics';

        $this->view->content = $this->view->render('/panel/stats.php');
    }

}

?>
