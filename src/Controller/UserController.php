<?php
namespace Controller;

use Model\User;

class UserController extends Controller {

    private $newUser;

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
        $user = new User($id);

        if($user->getRank() > 1)
            $this->errors[] = "User cannot be deleted.";

        return empty($this->errors) ? $user->delete() : false;
    }

    private function validateSubmit() {

        $firstname = $this->sanitize($_POST["firstname"]);
        $lastname = $this->sanitize($_POST["lastname"]);
        $email = $this->sanitize($_POST["email"]);
        $password = $this->sanitize($_POST["password"]);
        $password2 = $this->sanitize($_POST["password2"]);
        $differentAddresses = isset($_POST["same-address"]) ? false : true;
        $shipAddress = $this->retrieveShippingAdress();
        $fullName = $firstname . " " . $lastname;


        if(!$this->verifyFormToken("register"))
            $errors[] = "Wrong form token, please try again.";

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Please enter a valid email.";

        if($this->newUser->doesUserExist($email))
            $errors[] = "This email is already registered.";

        if(strlen($password) < 8)
            $errors[] = "Your password is too short. Enter at least 8 characters.";

        if($password != $password2)
            $errors[] = "Passwords do not match, try again.";


        if($differentAddresses)
            $billAddress = $this->retrieveBillingAdress();
        else
            $billAddress = $shipAddress;

        if(empty($fullName) || empty($email) || empty($password)
        || empty($shipAddress) || empty($billAddress))
            $errors[] = "Please fill in all required fields.";


        if(!isset($errors)){
            $this->form["fullName"] = $fullName;
            $this->form["email"] = $email;
            $this->form["password"] = $password;
            $this->form["shipAddress"] = $shipAddress;
            $this->form["billAddress"] = $billAddress;

            return null;
        }

        return $errors;
    }

    private function retrieveBillingAdress(): string {

        $billing = [
            "address" => $this->sanitize($_POST["bill-address1"]),
            "address2" => $this->sanitize($_POST["bill-address2"]),
            "city" => $this->sanitize($_POST["bill-city"]),
            "state" => $this->sanitize($_POST["bill-state"]),
            "zip" => $this->sanitize($_POST["bill-zip"]),
            "country" => $this->sanitize($_POST["bill-country"])
        ];

        // Concatenate billing address
        $address = "";
        foreach($billing as $addressItem) {
            $address .= $addressItem . " ";
        }

        return $address;
    }

    private function retrieveShippingAdress(): string {
        $shipping = [
            "address" => $this->sanitize($_POST["ship-address1"]),
            "address2" => $this->sanitize($_POST["ship-address2"]),
            "city" => $this->sanitize($_POST["ship-city"]),
            "state" => $this->sanitize($_POST["ship-state"]),
            "zip" => $this->sanitize($_POST["ship-zip"]),
            "country" => $this->sanitize($_POST["ship-country"])
        ];

        // Concatenate shipping address
        $address = "";
        foreach($shipping as $addressItem) {
            $address .= $addressItem . " ";
        }

        return $address;
    }

}
?>
