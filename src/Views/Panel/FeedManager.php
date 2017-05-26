<?php
namespace Views\Panel;

use Views\Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;
use Model\User;

class FeedManager extends Views {

    public function __construct(Template &$viewTemplate, User $user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'Manage publications';

        $blogs = new BlogPost(new Database());
        $this->view->publications = $blogs->loadAllPosts();

        $this->view->deleteToken = $blogs->generateFormToken('deletePost');

        $this->view->content = $this->view->render('/panel/feed-manager.php');
    }

}

?>
