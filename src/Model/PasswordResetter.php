<?php
namespace Model;

use Core\Database;

class PasswordResetter extends Model {
    const PASSWORD_ATTEMPT_LIMIT = 8;

    public function __construct(Database $db) {
        parent::__construct($db);
    }

    public function load(string $email) {

        try {
            //$stmt = $this->conn->prepare("SELECT * FROM user WHERE ")

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

    public function accountIsCompromised(string $email): bool {
        // verify if token is good
        try {
            $stmt = $this->conn->prepare("SELECT failedLogins FROM user WHERE email=:email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if($stmt->rowCount() == 1) {
                $user = $stmt->fetch();

                if($user["failedLogins"] > PASSWORD_ATTEMPT_LIMIT)
                    return true;
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function increaseFailedAttempts(string $email) {

        try {
            $stmt = $this->conn->prepare("UPDATE user SET failedLogins = failedLogins +1  WHERE email=:email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();


        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function resetFailedAttempts(string $email) {

        try {
            $stmt = $this->conn->prepare("UPDATE user SET failedLogins = 0 WHERE email=:email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>
