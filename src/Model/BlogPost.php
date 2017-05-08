<?php
namespace Model;

use Core\Database;

class BlogPost {
    private $id;
    private $title = 'Title';
    private $content = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod *';
    private $thumbnail = 'https://dummyimage.com/225x148/fff700/0011ff';
    private $conn;

    public function __construct($id = null) {
        $db = new Database();
        $this->conn = $db->getConnection();

        if(!is_null($id))
            $this->load($id);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getThumbnail() {
        return $this->thumbnail;
    }

    public static function loadAllPosts(): array {
        // return array of all blog posts in db
    }

    private function load($id) {
        // load from db
    }
}

?>
