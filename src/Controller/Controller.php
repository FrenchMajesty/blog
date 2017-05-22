<?php
namespace Controller;

use Core\Database;
use Model\LogEntry;

use Exception;

class Controller {

    protected $form;
    protected $errors;

    public function verifyFormToken(string $form): bool {
        if(!isset($_SESSION[$form."_token"]))
            return false;

        if(!isset($_POST["token"]))
            return false;

        if($_SESSION[$form."_token"] !== $_POST["token"])
            return false;

        return true;
    }

    public function successMessage(string $message): string {
        return '<div class="alert alert-success">'. $message .'</div>';
    }

    public function dispatchErrors(): string {
        $err = "";

        if(empty($this->errors)) $err = "Unknown Database error while performing operation.";
        else {
            foreach($this->errors as $errMessage) {
                $err .= $errMessage . "<br>";
            }
        }
        return '<div class="alert alert-danger">' . $err . '</div>';
    }

    public function getRawErrors(): array {
        return $this->errors;
    }

    protected function throwException(string $errMsg) {
        throw new Exception($errMsg);
    }

    protected function saveToLog(string $operation, string $details) {

        $log = new LogEntry(new Database());
        $log->save($operation, $details);
    }

    protected function sanitize(string $input): string {
        return strip_tags(str_replace(array('"', "'"),'',$input));
    }
}
 ?>
