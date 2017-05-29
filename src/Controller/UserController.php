<?php
namespace Controller;

use Core\Database;
use Core\File;

use Model\User;

class UserController extends Controller {
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function create(): bool {

        $this->newUser = new User();
        $this->errors = $this->validateSubmit();


        if(empty($this->errors)) {
            $this->newUser->setEmail($this->form["email"]);
            $this->newUser->setPassword($this->form["password"]);
            $this->newUser->setName($this->form["fullName"]);
            $this->newUser->setShipAddress($this->form["shipAddress"]);
            $this->newUser->setBillAddress($this->form["billAddress"]);

            $this->newUser->create();
            return true;

        }else {
            return false;
        }
    }

    public function deleteUser($id): bool {
        $user = new User(new Database, $id);

        if($user->getRank() > 1)
            $this->errors[] = "User cannot be deleted.";

        return empty($this->errors) ? $user->delete() : false;
    }

    public function login(): bool {

        $user = new User(new Database());

        $email = $this->sanitize($_POST["email"]);
        $password = $this->sanitize($_POST["password"]);

        if(!$this->verifyFormToken('login'))
            $this->errors[] = "Wrong form submitted, please try again.";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->errors[]= "The email entered is not a valid one.";

        if(!$user->login($email, $password)) {
            $this->errors[] = "Incorrect email or password.";

            $user->increaseFaildeAttempts($email);
        }

        if(empty($this->errors))
            return true;
        else
            return false;
    }

    public function updateBloggerDetails(): bool {


        $id = $this->sanitize($_POST["id"]);
        $email = $this->sanitize($_POST["email"]);
        $password = $this->sanitize($_POST["password"]);
        $password2 = $this->sanitize($_POST["password2"]);
        $firstName = $this->sanitize($_POST["firstname"]);
        $lastName = $this->sanitize($_POST["lastname"]);
        $location = $this->sanitize($_POST["location"]);
        $occupation = $this->sanitize($_POST["occupation"]);
        $shortBio = $this->sanitize($_POST["short-bio"]);
        $biography = $this->sanitize($_POST["long-bio"]);
        $image = @($_FILES["image"]["size"] > 0) ? new File($_FILES["image"]) : NULL;

        $user = new User(new Database, $id);

        if($user->getID() == NULL)
            $this->errors[] = "User with given ID could not be found.";

        if(!$this->verifyFormToken('updateDetails'))
            $this->errors[] = "Wrong form submitted, please try again.";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->errors[]= "The email entered is not a valid one.";

        if($password != $password2)
            $this->errors[] = "Passwords do not match.";

        if(empty($firstName) || empty($lastName))
            $this->errors[] = "Please enter your first and last name.";

        if(strlen($location) > 50)
            $this->errors[] = "Location is too long.";

        if(count(explode(",",$occupation)) > 5)
            $this->errors[] = "You have too many occupations, enter 5 or less.";

        if(strlen($shortBio) > 200)
            $this->errors[] = "Enter a description of you shorter than 200 characters.";

        if(strlen($shortBio) < 3)
            $this->errors[] = "Your description of yourself is too short.";

        if(!is_null($image) && !$image->uploadImage())
            $this->errors[] = "There was an error uploading your image.";

        if(empty($email) ||empty($location) || empty($occupation) || empty($shortBio) || empty($biography))
            $this->errors[] = "Fill in all the required fields.";

        if(empty($this->errors)) {

            $user->setEmail($email);
            $user->setName($firstName . ' ' . $lastName);
            $user->setAddress($location);
            $user->setOccupation($occupation);
            $user->setShortBio($shortBio);
            $user->setBiography($biography);

            if(!is_null($image)) $user->setPicture($image->getUrl());

            if(!empty($password)) $user->setPassword($password);

            $user->update();
            $this->saveToLog("Update Details", "Blogger details were updated.", $this->user->getID());

            return true;

        }else {
            return false;
        }
    }

}
?>
