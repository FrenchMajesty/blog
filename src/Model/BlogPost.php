<?php
namespace Model;

use Core\Database;

class BlogPost extends Model {
    private $id;
    private $title = 'Title';
    private $content = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod *';
    private $media = 'https://dummyimage.com/225x148/fff700/0011ff';
    private $datePosted;

    public function __construct($id = null) {

        if(!is_null($id))
            $this->load($id);
    }

    public function create() {
        try {
            $stmt = $this->conn->prepare("INSERT INTO blog_posts(title, content, media, date_posted)
                                                    VALUES (:title, :content, :media, :datePosted)");

            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":content", $this->content);
            // Bind media??
            $stmt->bindParam(":datePosted", $this->getTimestamp());


            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function loadAllPosts(): array {
        $allBlogs = [];

        try {

            $stmt = $this->conn->prepare("SELECT id FROM blog_posts");
            $stmt->execute();

            $blogposts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($blogposts as $blog) {
                $allBlogs[] = new BlogPost($blog["id"]);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $allBlogs;
    }

    public function getID(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function getMedia() {
        return $this->media;
    }

    public function getDate(): string {
        return $this->datePosted;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setContent(string $content) {
        $this->content = $content;
    }

    public function setMedia($media) {
        $this->media = $media;
    }

    private function getTimestamp(): string {
        return '2017-05-23';
    }

    private function load($id) {
        $this->id = $id;

        try {

            $stmt = $this->conn->prepare("SELECT * FROM blog_posts WHERE id=:id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();

            if($stmt->rowCount() == 1) {

                $blog = $stmt->fetch(PDO::FETCH_ASSOC);

                $this->title = $blog["title"];
                $this->content = $blog["content"];
                $this->media = $blog["media"];
                $this->datePosted = $blog["date_posted"];
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>
