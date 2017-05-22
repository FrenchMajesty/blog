<?php
namespace Model;

use Core\Database;

class Model {
    protected $conn;
    protected $_db;

    protected function __construct(Database $db) {

        $this->conn = $db->getConnection();
        $this->_db = $db;
    }

    public static function generateFormToken(string $form): string {
        $token = md5(uniqid(microtime(), true));

        $_SESSION[$form."_token"] = $token;

        return $token;
    }
}
?>
