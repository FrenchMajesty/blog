<?php
namespace Controller;

use Core\Database;
use Core\File;

use Model\BlogPost;
use Model\User;


class BlogPostController extends Controller {
    private $user;

    public function __construct(User &$user) {
        $this->user = $user;
    }

    public function createPost(): bool {

        // Form verification
        $name = $this->sanitize($_POST["name"]);
        $description = $this->sanitize($_POST["description"]);
        $type = $this->sanitize($_POST["type"]);
        $category = $this->sanitize($_POST["category"]);
        $tags = explode(",", $this->sanitize($_POST["tags"]));

        $image = isset($_FILES["image"]) ?
                 new File($_FILES["image"]) : NULL;

        $embed = isset($_POST["embed"]) ? $_POST["embed"] : NULL;

        if(strlen($name) > 50)
            $this->errors[] = "Title is too long.";

        if(strlen($name) < 3)
            $this->errors[] = "Title is too short.";

        if(!$this->verifyFormToken("createPost"))
            $this->errors[] = "Incorrect form submitted, please refresh.";

        if(strlen($category) > 15)
            $this->errors[] = "Category name is too long.";

        if(strlen($category) < 2)
            $this->errors[] = "Category name is too short.";

        if(count($tags) > 10)
            $this->errors[] = "Please enter 10 tags or less.";

        if(!is_null($image) && !$image->uploadImage())
             $this->errors[] = "The image could not be uploaded and may be invalid.";


        if(!is_null($embed) && $embed > 10000)
            $this->errors[] = "Your text or embed tags are too long. Please use less than 8000 characters.";

        if($type != "picture" && $type != "video" && $type != "text" && $type != "media")
            $this->errors[] = "Incorrect publication type.";


        if(empty($name) || empty($category) || empty($description) || empty($type) || empty($tags))
            $this->errors[] = "All fields must be filled.";


        if(empty($this->errors)) {

            $blog = new BlogPost(new Database());

            $blog->setName($name);
            $blog->setDescription($description);
            $blog->setCategory($category);
            $blog->setType($type);
            $blog->setTags($tags);

            if(!empty($embed))
                $blog->setMedia($embed);
            else
                $blog->setMedia($image);


            $blog->create();
            $this->saveToLog("Create Publication", "Post (ID: ".$blog->getID().") was created.", $this->user->getID());

            return true;

        }else {
            return false;
        }
    }

    public function updatePost(): bool {

        $id = $this->sanitize($_POST["id"]);
        $name = $this->sanitize($_POST["name"]);
        $description = $this->sanitize($_POST["description"]);
        $category = $this->sanitize($_POST["category"]);
        $tags = explode(",", $this->sanitize($_POST["tags"]));
        $embed = isset($_POST["embed"]) ? $_POST["embed"] : NULL;
        $image = @($_FILES["image"]["size"] > 0) ? new File($_FILES["image"]) : NULL;
        $canUpload = false;

        $blog = new BlogPost(new Database(), $id);

        if($blog->getID() == NULL)
            $this->errors[] = "Could not find the publication to update.";

        if(strlen($name) > 50)
            $this->errors[] = "Title is too long.";

        if(strlen($name) < 3)
            $this->errors[] = "Title is too short.";

        if(!$this->verifyFormToken("editPost"))
            $this->errors[] = "Incorrect form submitted, please refresh.";

        if(strlen($category) > 15)
            $this->errors[] = "Category name is too long.";

        if(strlen($category) < 2)
            $this->errors[] = "Category name is too short.";

        if(count($tags) > 10)
            $this->errors[] = "Please enter 10 tags or less.";

        if(!is_null($image) && $blog->differentImages($image))
            $canUpload = true;

        if($canUpload && !$image->uploadImage())
            $this->errors[] = "There was an error uploading your image.";

        if(!is_null($embed) && strlen($embed) > 10000)
            $this->errors[] = "Your text or embed tags are too long. Please use less than 8000 characters.";

        if(empty($this->errors)) {

            $blog->setName($name);
            $blog->setDescription($description);
            $blog->setCategory($category);
            $blog->setTags($tags);

            if(!empty($embed))
                $blog->setMedia($embed);
            else if(!empty($image))
                $blog->setMedia($image);

            $blog->update();
            $this->saveToLog("Delete Publication", "Post (ID: ".$blog->getID().") was deleted.", $this->user->getID());
            return true;

        }else {
            return false;
        }

    }

    public function deletePost(): bool {

        $id = $this->sanitize($_POST["id"]);
        $blog = new BlogPost(new Database(), $id);


        if(!$this->verifyFormToken("deletePost"))
            $this->errors[] = "Incorrect form submitted.";

        if($blog->getID() == NULL)
            $this->errors[] = "Publication with that ID, could not be found.";


        if(empty($this->errors)) {

            //$blog->delete();
            //$this->saveToLog("Delete Publication", "Post (ID: ".$blog->getID().") was deleted.", $this->user->getID());

            return true;

        }else {
            return false;
        }
    }

}

?>
