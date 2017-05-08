<?php
namespace Controller;

class ContactController extends Controller {

    public function send(): bool {
        // Form verification

        $name = $this->sanitize($_POST["name"]);
        $email = $this->sanitize($_POST["email"]);
        $title = $this->sanitize($_POST["title"]);
        $message = $this->sanitize($_POST["message"]);


        if(!$this->verifyFormToken('contact'))
            $this->errors[] = "Wrong form submitted, please try again,";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->errors[] = "Enter a valid email address.";

        if(strlen($title) < 3)
            $this->errors[] = "Title is too short.";

        if(strlen($message) < 25)
            $this->errors[] = "Enter a message of at least 25 characters.";

        if(strlen($name) < 3)
            $this->errors[] = "Name is too short.";

        if(strlen($name) > 25)
            $this->errors[] = "Name is too long.";

        if(empty($name) || empty($email) || empty($title) || empty($message))
            $this->errors[] = "Fill out all the fields.";

        if(empty($this->errors)) {

            $this->sendEmail($name, $email, $title, $message);
            return true;

        }else {
            return false;
        }
    }

    private function sendEmail($name, $email, $title, $message) {
        // send email code
    }
}

?>
