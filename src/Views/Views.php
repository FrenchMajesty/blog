<?php
namespace Views;

use Core\Template;

class Views {
    protected $view;

    protected function __construct(Template &$viewTemplate) {
        $this->view = $viewTemplate;

        $this->initializeFunctions();
    }

    protected function stylize(string $text): string {
        return "<center><h4>" . $text . "</h4></center>";
    }

    private function initializeFunctions() {
        // To be used in the views template

        $this->view->formatDate = function($date) {
            // format date..
        };
    }
}

?>
