<?php
namespace Controller;

use Model\Sermon;
use Core\Database;

class BlogPostController extends Controller {


    public function create(): bool {

        // Form verification
        $id = $this->sanitize($_POST["id"]);
        $title = $this->sanitize($_POST["title"]);
        $category = $this->sanitize($_POST["category"]);
        $summary = $this->sanitize($_POST["summary"]);
        $media = $_POST["media"];
        $tags = $this->sanitize($_POST["tags"]);
        $operation = $this->sanitize(strtolower($_POST["operation"]));


        if(strlen($title) > 50)
            $this->errors[] = "Title is too long.";

        if(strlen($title) < 3)
            $this->errors[] = "Title is too short.";

        if(!$this->verifyFormToken('postBlog'))
            $this->errors[] = "Incorrect form submitted, please refresh.";

        if(strlen($category) > 20)
            $this->errors[] = "Category name is too long.";

        if(strlen($category) < 2)
            $this->errors[] = "Category name is too short.";

        if($operation != "add" && $operation != "edit")
            $this->errors[] = "Wrong operation to perform.";

        if(empty($title) || empty($category) || empty($summary) || empty($media) || empty($tags) || empty($operation))
            $this->errors[] = "All fields must be filled.";


        if(empty($this->errors)) {

            $blog = new BlogPost(new Database());

            $blog->setTitle($title);
            $blog->setMedia($media);
            $blog->setSummary($summary);
            $blog->setTags($tags);
            $blog->setCategory($category);
            $blog->setDate(date("M-d-Y"));


            if($operation == 'add') {
                $blog->save();
                $this->saveToLog('Post Blog', 'Blog (ID: '.$blog->getID().') was posted.');

            }else if($operation == 'edit') {

                $blog->update($id);
                $this->saveToLog('Edit Blog', 'Blog (ID: '.$blog->getID().') was edited.');
            }

            return true;

        }else {
            return false;
        }
    }

    public function delete(): bool {

        $id = $this->sanitize($_POST["id"]);


        if(!$this->verifyFormToken('deleteBlog'))
            $this->errors[] = "Incorrect form submitted.";

        if(!is_numeric($id))
            $this->errors[] = "Invalid blog ID, please refresh the page.";

        if(empty($this->errors)) {

            $blog = new Blog(new Database(), $id);

            $blog->delete();
            $this->saveToLog('Delete Sermon', 'Blog (ID: '.$blog->getID().') was deleted.');

            return true;

        }else {
            return false;
        }
    }

}

?>
