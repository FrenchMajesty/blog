<?php
namespace Model;

use Core\Database;
use PDO;

class LogEntry extends Model {
    private $id;
    private $operation;
    private $message;
    private $timestamp;

    public function __construct(Database $db, $id = null, $row = null) {
        parent::__construct($db);

        if(!is_null($row))
            $this->loadRow($row);
        else if(!is_null($id))
            $this->load($id);
    }

    public function save(string $operation, string $details, int $userID) {

        try {
            $stmt = $this->conn->prepare("INSERT INTO logs (operation, message, user_id) VALUES (:operation, :details, :id)");
            $stmt->bindParam(":operation", $operation);
            $stmt->bindParam(":details", $details);
            $stmt->bindParam(":id", $userID);
            $stmt->execute();


        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function loadLatest(int $limit = 4): array {
        $latestLogs = [];

        try {
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $stmt = $this->conn->prepare("SELECT * FROM logs ORDER BY id DESC LIMIT :limit");
            $stmt->bindParam(":limit", $limit);
            $stmt->execute();

            $logs = $stmt->fetchAll();

            if(count($logs) > 0) {

                return $logs;
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $latestLogs;
    }

    private function loadRow($row) {

        $this->id = $row["id"];
        $this->operation = $row["operation"];
        $this->message = $row["message"];
        $this->timestamp = $row["time_recorded"];
    }

    private function load($id) {
        $this->id = $id;

        try {
            $stmt = $this->conn->prepare("SELECT * FROM logs WHERE id=:id");
            $stmt->bindParam(":id", $this->id);

            $stmt->execute();

            if($stmt->rowCount() == 1) {
                $log = $stmt->fetch();

                $this->operation = $log["operation"];
                $this->message = $log["message"];
                $this->timestamp = $log["date_recorded"];

            }else {
                $this->id = null;
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
