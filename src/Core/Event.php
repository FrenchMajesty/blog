<?php
namespace Core;

class Event {
    private $name;
    private $params;

    public function __construct(string $name, array $params = []) {
        $this->name = $name;
        $this->params = $params;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getParam(string $name) {
        $param = @$this->params[$name];

        return (!empty($param)) ? $param : 'PARAM NOT FOUND';
    }

    public function getAllParams(): array {
        return $this->params;
    }
}

?>
