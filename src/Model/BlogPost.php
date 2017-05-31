<?php
namespace Model;

use PDO;

use Core\Database;
use Core\File;

class BlogPost extends Model {
    private $id;
    private $name;
    private $description;
    private $category;
    private $type;
    private $media;
    private $tags;
    private $date;

    public function __construct(Database $db, $id = null, $row = null) {
        parent::__construct($db);

        if(!is_null($row))
            $this->loadRow($row);
        if(!is_null($id))
            $this->load($id);
    }

    public function create(): bool {

        try {
            $stmt = $this->conn->prepare("INSERT INTO blogposts (name, description, category, media_type, media, tags)
                                                    VALUES (:name, :description, :category, :type, :media, :tags)");

            $stmt->bindParam(":name",$this->name);
            $stmt->bindParam(":description",$this->description);
            $stmt->bindParam(":category",$this->category);
            $stmt->bindParam(":type",$this->type);
            $stmt->bindParam(":media",$this->media);
            @$stmt->bindParam(":tags",implode(",", $this->tags));

            $stmt->execute();

            if($stmt->rowCount() == 1) {
                $this->id = $this->conn->lastInsertId();
                return true;
            }

        }catch(PDOException $e) {
            echo $e->getMeesage();
        }

        return false;
    }

    public function update() {

        try {
            $stmt = $this->conn->prepare("UPDATE blogposts SET name= :name, description= :description, category=:category,
                                        media=:media , tags= :tags WHERE id=:id");

            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":category", $this->category);
            $stmt->bindParam(":media", $this->media);
            @$stmt->bindParam(":tags", implode(",", $this->tags));

            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {

        try {
            $stmt = $this->conn->prepare("DELETE FROM blogposts WHERE id=:id");
            $stmt->bindParam(":id", $this->id);

            $stmt->execute();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function loadAllPosts(): array {
        $blogPosts = [];

        try {
            $stmt = $this->conn->prepare("SELECT * FROM blogposts ORDER BY id DESC");
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

    public function loadAllGallery(): array {
        $blogPosts = [];

        try {
            $stmt = $this->conn->prepare("SELECT * FROM blogposts WHERE media_type='picture' ORDER BY id DESC");
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

    public function loadLatest(int $limit = 5): array {
        $latestPosts = [];

        try {
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $this->conn->prepare("SELECT * FROM blogposts ORDER BY id DESC LIMIT :limit");
            $stmt->bindParam(":limit", $limit);

            $stmt->execute();

            $posts = $stmt->fetchAll();

            foreach($posts as $row) {
                $latestPosts[] = new BlogPost($this->_db, null, $row);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }

        return $latestPosts;
    }

    public function getOldestPost(): BlogPost {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM blogposts ORDER BY date_posted ASC LIMIT 1");
            $stmt->execute();

            if($stmt->rowCount() == 1) {
                $blogRow = $stmt->fetch();

                return new BlogPost($this->_db, null, $blogRow);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function differentImages(File $image): bool {

        $img = md5_file($_SERVER['DOCUMENT_ROOT'] . '/blog' . $this->media);
        $img2 = md5_file($image->getAbsolute());

        return $img != $img2;
    }

    public function getID(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getMedia(): string {
        return $this->media;
    }

    public function getTags(): array {
        return $this->tags;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setDescription(string $text) {
        $this->description = $text;
    }

    public function setCategory(string $category) {
        $this->category = $category;
    }

    public function setType(string $type) {
        $this->type = $type;
    }

    public function setMedia($media) {

        if(is_string($media))
            $this->media = $media;
        else
            $this->media = $media->getUrl();
    }

    public function setTags(array $tags) {
        $this->tags = array_map('trim', $tags);
    }

    private function loadRow($blog) {

        $this->id = $blog["id"];
        $this->name= $blog["name"];
        $this->category = $blog["category"];
        $this->description = $blog["description"];
        $this->type = $blog["media_type"];
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

                $this->loadRow($blog);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
