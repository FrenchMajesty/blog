<?php
namespace Controller;

use Model\Contact;

class ContactController extends Controller {
    private $contactForm;

    public function send(): bool {
        // Form verification

        $contactForm = new Contact();

        $name = $this->sanitize($_POST["name"]);
        $email = isset($_POST["email"]) ? $this->sanitize($_POST["email"]) : null;
        $title = $this->sanitize($_POST["title"]);
        $message = $this->sanitize($_POST["message"]);
        $type;

        if(empty($email))
            $type = "prayer";
        else
            $type ="email";


        if(!$this->verifyFormToken('contact'))
            $errors[] = "Wrong form submitted, please try again,";

        if($type == "email" && !filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Enter a valid email address.";

        if(strlen($title) < 3)
            $errors[] = "Title is too short.";

        if(strlen($message) < 25)
            $errors[] = "Enter a message of at least 25 characters.";

        if(strlen($name) < 3)
            $errors[] = "Name is too short.";

        if(strlen($name) > 25)
            $errors[] = "Name is too long.";

        if(empty($this->errors)) {

            $this->contactForm->setName($name);
            $this->contactForm->setEmail($email);
            $this->contactForm->setTitle($title);
            $this->contactForm->setMessage($message);


            if($type == "email")
                $this->contactForm->sendEmail();
            else
                $this->contactForm->sendPrayerRequest();

            return true;

        }else {
            return false;
        }
    }
}

?>
