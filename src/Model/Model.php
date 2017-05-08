<?php
namespace Model;

use Core\Database;

class Model {
    protected $conn;

    protected function __construct() {

        $db = new Database();
        $this->conn = $db->getConnection();
    }
}
?>
