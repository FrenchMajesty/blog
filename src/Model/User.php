<?php
namespace Model;

use Core\Database;
use Core\File;
use PDO;

class User extends Model {
    private $id;
    private $email;
    private $password;

    private $fullName;
    private $address;
    private $picture;

    private $occupation;
    private $socialMedias;
    private $interests;
    private $shortBio;
    private $biography;



    public function __construct(Database $db, $id = null, $row = null) {
        parent::__construct($db);

             if(!is_null($row))$this->loadRow($row);
        else if(!is_null($id)) $this->load($id);
    }

    public function create() {

        try {
            $stmt = $this->conn->prepare("INSERT INTO user(email,password,name,address,picture,occupation,interests,socials,biography)
                                            VALUES (:email,:password,:name, :address, :picture, :occupation, :interests, :socials, :biography)");

            $stmt->bindparam(":email", $this->email);
            $stmt->bindparam(":password", $this->password);
            $stmt->bindparam(":name", $this->fullName);
            $stmt->bindparam(":address", $this->address);
            $stmt->bindparam(":picture", $this->picture);
            $stmt->bindparam(":occupation", $this->occupation);
            $stmt->bindparam(":interests", implode(",", $this->interests));
            $stmt->bindparam(":socials", $this->socialMedias);
            $stmt->bindparam(":biography", $this->biography);

            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update() {

        try {
            $stmt = $this->conn->prepare("UPDATE user SET email= :email, password= :password, name= :name, address= :address, picture= :picture,
                                            occupation= :occupation, interests= :interests, socials= :socialMedias, short_bio= :shortBio, biography= :bio
                                            WHERE id= :id");

            $stmt->bindparam(":id", $this->id);
            $stmt->bindparam(":email", $this->email);
            $stmt->bindparam(":password", $this->password);
            $stmt->bindparam(":name", $this->fullName);
            $stmt->bindparam(":address", $this->address);
            $stmt->bindparam(":picture", $this->picture);
            $stmt->bindparam(":occupation", $this->occupation);
            @$stmt->bindparam(":interests", implode(",", $this->interests));
            @$stmt->bindparam(":socialMedias", json_encode($this->socialMedias));
            $stmt->bindparam(":shortBio", $this->shortBio);
            $stmt->bindparam(":bio", $this->biography);

            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function login($email, $password): bool {
        try {
            $stmt = $this->conn->prepare("SELECT id, email, password FROM user WHERE email=:email");
            $stmt->bindparam(":email", $email);
            $stmt->execute();

            $user=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1) {

                if(password_verify($password, $user["password"])) {
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

    public function lastRecoveryEmail($email) {
        // get timestamp for last recovery email
        try {

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function verifyRecoveryToken(string $token) {
        // verify if token is good
        try {

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setName(string $name) {
        $this->fullName = $name;
    }

    public function setAddress(string $address) {
        $this->address = $address;
    }

    public function setPicture($pic) {
        $this->picture = $pic;
    }

    public function setOccupation(string $occupation) {
        $this->occupation = $occupation;
    }

    public function setSocials($ss) {
        $this->socialMedias = $ss;
    }

    public function setInterests(array $interests) {
        $this->interests = $interests;
    }

    public function setShortBio(string $bio) {
        $this->shortBio = $bio;
    }

    public function setBiography(string $bio) {
        $this->biography = $bio;
    }

    public function getID(): int {
        return (int) $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getName($part = "full"): string {
        $name = explode(" ", $this->fullName);

        if($part == "full")
            $str = $this->fullName;
        else if($part == "first")
            $str = $name[0];
        else if($part == "last")
            $str = $name[1];

        return $str;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getOccupation(): string {
        return $this->occupation;
    }

    public function getInterests(): array {
        return $this->interests;
    }

    public function getSocialMedias() {
        return $this->socialMedias;
    }

    public function getShortBio(): string {
        return $this->shortBio;
    }

    public function getBiography(): string {
        return $this->biography;
    }

    public function getFailedAttempts(): int {

        try {
            $stmt = $this->conn->prepare("SELECT failedLogins FROM user");
            $stmt->execute();

            $userRow = $stmt->fetch();

            return $userRow["failedLogins"];

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function loadFromSession(): bool {
        $this->load($_SESSION["user_session"]);

        return !is_null($this->getID());
    }

    private function loadRow($row) {

        $this->id = $row["id"];
        $this->email = $row["email"];
        $this->password = $row["password"];
        $this->fullName = $row["name"];
        $this->address = $row["address"];
        $this->picture = $row["picture"];
        $this->occupation = $row["occupation"];
        $this->interests = explode(",", $row["interests"]);
        $this->socialMedias = json_decode($row["socials"], true);
        $this->shortBio = $row["short_bio"];
        $this->biography = $row["biography"];
    }

    private function load($id) {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $user = $stmt->fetch();

            if($stmt->rowCount() == 1) {

                $this->loadRow($user);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
 ?>
