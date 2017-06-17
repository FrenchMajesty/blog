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
            return date("M d, Y", strtotime($date));
            // format date..
        };

        $this->view->formatTags = function($tags) {
            $result = '';
            foreach($tags as $tag) {
                $result .= '<a href="#">#' . $tag . '</a> ';
            }

            return $result;
        };

        $this->view->formatMedia = function ($sitelink, $post, $big = false) {

            if($post->getType() == 'picture') {
                $res = '<img src="'. $sitelink . $post->getMedia().'" alt="">';

            } else if($post->getType() == 'video') {
                $style = $big ? 'height: 470px;' : 'height: 311px;';
                $res = '<div style="'.$style.'">' . $post->getMedia() . '</div>';

            } else {
                $res = '<img src="'.$sitelink.'/static/images/img-26.png" alt="">';
            }

            return $res;
        };

        $this->view->capitalize = function ($str) {
            return ucfirst($str);
        };

        $this->view->allCaps = function ($str) {
            return strtoupper($str);
        };

    }
}

?>
