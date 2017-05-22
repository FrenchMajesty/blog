<?php
namespace Core;

class Template {
    private $vars = [];


    public function __get($name) {
        return $this->vars[$name];
    }

    public function __set($name, $value) {
        if($name == 'view_template_file') {
            throw new Exception("Cannot bind variable named 'view_template_file'");
        }

        $this->vars[$name] = $value;
    }

    public function render($view_template_file) {

        if(array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("Cannot bind variable called 'view_template_file'");
        }
        extract($this->vars);
        ob_start();
        include($_SERVER['DOCUMENT_ROOT'] . '/blog/views/'. $view_template_file);
        return ob_get_clean();
    }
}

?>
