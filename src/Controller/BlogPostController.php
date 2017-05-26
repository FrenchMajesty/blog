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

        $image = isset($_FILES['image']) ?
                 new File($_FILES["image"]) : NULL;

        $embed = isset($_POST['embed']) ?
                 $this->sanitize($_POST["embed"]) : NULL;

        if($type == 'text')
            $embed = $_POST["embed"];

        if(strlen($name) > 50)
            $this->errors[] = "Title is too long.";

        if(strlen($name) < 3)
            $this->errors[] = "Title is too short.";

        if(!$this->verifyFormToken('createPost'))
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
            $this->errors[] = "Your text or embed tags are too long. Please use less than 5000 characters.";

        if($type != 'picture' && $type != 'video' && $type != 'text' && $type != 'media')
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
            //$this->saveToLog('Create Publication', 'Blog (ID: '.$blog->getID().') was created.', $this->user->getID());

            return true;

        }else {
            return false;
        }
    }

    public function deletePost(): bool {

        $id = $this->sanitize($_POST["id"]);


        if(!$this->verifyFormToken('deleteBlog'))
            $this->errors[] = "Incorrect form submitted.";

        if(!is_numeric($id))
            $this->errors[] = "Invalid blog ID, please refresh the page.";

        if(empty($this->errors)) {

            $blog = new Blog(new Database(), $id);

            $blog->delete();
            $this->saveToLog('Delete Publication', 'Blog (ID: '.$blog->getID().') was deleted.');

            return true;

        }else {
            return false;
        }
    }

}

?>
