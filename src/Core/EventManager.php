<?php
namespace Core;

use Core\Event;

class EventManager {
    private static $events;

    public function attach(string $name, $callback) {
        self::$events[$name][] = $callback;

    }

    public function trigger(string $name , array $params = []) {
        foreach (self::$events[$name] as $event => $callback) {
            $e = new Event($name, $params);
            $callback($e);
        }
    }

    public function detach($name) {

        if(isset(self::$events[$name]))
            unset(self::$events[$name]);
    }
}

?>
