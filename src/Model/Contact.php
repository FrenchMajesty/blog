<?php
namespace Model;

class Contact extends Model {
    private $id;
    private $name;
    private $email;
    private $title;
    private $message;

    public function __construct() {

        parent::__construct();
    }

    public function sendEmail() {

        // script to send email
    }

    public function sendPrayerRequest() {

        try {

           // $stmt = $this->conn->prepare(" ");
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":message", $this->message);
            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getAllPrayerRequest(): array {
        try {

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPrayerRequest(int $id): array {

        try {

            $stmt = $this->conn->prepare("SELECT * FROM ??? WHERE id=:id");
            $stmt->bindParam(":id", $id);

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function getID(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function geMessage(): string {
        return $this->message;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setMessage(string $message) {
        $this->message = $message;
    }

}

?>
