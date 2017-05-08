<?php
namespace Views;

class Views {
    protected $value;

    public function value() {
        return $this->value;
    }

    protected function stylize(string $text): string {
        return "<center><h4>" . $text . "</h4></center>";
    }
}

?>
