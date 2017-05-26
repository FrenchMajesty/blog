<?php
namespace Model;

use Core\Database;

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
        return implode(",", $this->name);
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
