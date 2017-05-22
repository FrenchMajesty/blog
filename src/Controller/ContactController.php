<?php
namespace Controller;


class ContactController extends Controller {
    private $contactForm;

    public function send(): bool {
        // Form verification

        $name = $this->sanitize($_POST["name"]);
        $email = $this->sanitize($_POST["email"]);
        $subject = $this->sanitize($_POST["subject"]);
        $message = $this->sanitize($_POST["message"]);

        if(!$this->verifyFormToken('contact'))
            $this->errors[] = "Wrong form submitted, please try again,";

        if($type == "email" && !filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->errors[] = "Enter a valid email address.";

        if(strlen($subject) < 3)
            $this->errors[] = "Subject is too short.";

        if(strlen($message) < 25)
            $this->errors[] = "Enter a message of at least 25 characters.";

        if(strlen($name) < 3)
            $this->errors[] = "Name is too short.";

        if(strlen($name) > 25)
            $this->errors[] = "Name is too long.";


        if(empty($this->errors)) {

            $this->sendEmail($name, $email, $subject, $message);
            return true;

        }else {
            return false;
        }
    }

    private function sendEmail(string $name, string $email, string $subject, string $message) {
        // Send an email here
    }
}

?>
