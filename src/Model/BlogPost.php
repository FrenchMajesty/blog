<?php
namespace Model;

use Core\Database;

class BlogPost extends Model {
    private $id;
    private $title = 'Title';
    private $category = 'design';
    private $summary = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod *';
    private $media = 'https://dummyimage.com/225x148/fff700/0011ff';
    private $mediaType;
    private $date;
    private $tags;

    public function __construct(Database $db, $id = null, $row = null) {
        parent::__construct($db);

        if(!is_null($row))
            $this->loadRow($row);
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
        $blogPosts = [];

        try {
            $stmt = $this->conn->prepare("SELECT * FROM blogposts");
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $blogs = $stmt->fetchAll();

                foreach($blogs as $row) {
                    $blogPosts[] = new BLogPost($this->_db, null, $row);
                }
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $blogPosts;
    }

    private function loadRow($blog) {

        $this->id = $blog["id"];
        $this->title= $blog["title"];
        $this->category = $blog["category"];
        $this->summary = $blog["summary"];
        $this->media = $blog["media"];
        $this->tags = explode(",", $blog["tags"]);
        $this->date = $blog["date_posted"];
    }

    private function load($id) {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM blogposts WHERE id=:id");
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            if($stmt->rowCount() == 1) {
                $blog = $stmt->fetch();

                $this->id = $blog["id"];
                $this->title= $blog["title"];
                $this->category = $blog["category"];
                $this->summary = $blog["summary"];
                $this->media = $blog["media"];
                $this->tags = explode(",", $blog["tags"]);
                $this->date = $blog["date_posted"];
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
