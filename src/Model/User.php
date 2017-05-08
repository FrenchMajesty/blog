<?php
namespace Model;

use Core\Database;
use Core\File;
use PDO;

class User extends Model {
    private $id;
    private $email;
    private $password;
    private $rank = 1;
    private $fullName;
    private $shipAddress;
    private $billAddress;

    public function __construct($id = null) {
        parent::__construct();
        $this->id = $id;

        if(!empty($id)) $this->loadUser();
    }

    public function getID() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRank() {
        return $this->rank;
    }

    public function getShipAddress() {
        return $this->shipAddress;
    }

    public function getBillAddress() {
        return $this->billAddress;
    }

    public function setName(string $name) {
        $this->fullName = $name;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setShipAddress(string $address) {
        $this->shipAddress = $address;
    }

    public function setBillAddress(string $address) {
        $this->billAddress = $address;
    }

    public function login($email, $password): bool {
        try {
            $stmt = $this->conn->prepare("SELECT email, password FROM users WHERE email=:email");
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            $user=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {

                if($password == $user["password"]) {
                    $_SESSION["user_session"] = $user["id"];
                    return true;
                }else {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function logout() {
        session_destroy();
        unset($_SESSION["user_session"]);
    }

    public function isAdmin(): bool {
        if($this->rank > 1)
            return true;
        else
            return false;
    }

    public function isLoggedIn(): bool {
        return isset($_SESSION["user_session"]) ? true : false;
    }

    public function redirectTo($url) {
        header("Location: $url");
    }

    public function create() {

        try {
            $stmt = $this->conn->prepare("INSERT INTO users(email,password,`rank`,full_name, ship_address, bill_address)
                                            VALUES (:email,:password,:urank, :fullName, :shipAddress, :billAddress)");

            $stmt->bindparam(":email", $this->email);
            $stmt->bindparam(":password", $this->password);
            $stmt->bindparam(":urank", $this->rank);
            $stmt->bindparam(":fullName", $this->fullName);
            $stmt->bindparam(":shipAddress", $this->shipAddress);
            $stmt->bindparam(":billAddress", $this->billAddress);

            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindParam(":id", $this->id);

            return $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function doesUserExist($email): bool {

        try {
            $stmt = $this->conn->prepare("SELECT id FROM users WHERE email= :email");
            $stmt->bindParam(":email", $email);

            $stmt->execute();
            $usersFound = $stmt->rowCount();

        }catch(PDOException $e) {
            echo $e-getMessage();
        }

        return ($usersFound > 0) ? true : false;
    }

    public function loadAll(): array {
        $userList = [];
        try {
            $stmt = $this->conn->prepare("SELECT id FROM users");
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($users as $user) {
                $userList[] = new User($user["id"]);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $userList;
    }

    public function generateFormToken(string $form): string {
        $token = md5(uniqid(microtime(), true));

        $_SESSION[$form."_token"] = $token;

        return $token;
    }

    private function loadUser($id = null) {
        $id = $id ?: $this->id;

        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0) {

                $this->email = $user["email"];
                $this->fullName = $user["full_name"];
                $this->rank = $user["rank"];
                $this->shipAddress = $user["ship_address"];
                $this->billAddress = $user["bill_address"];
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
 ?>
