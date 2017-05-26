<?php
namespace Views\Panel;

use Views\Views;

use Core\Database;
use Core\Template;

use Model\BlogPost;
use Model\User;

class GalleryManager extends Views {

    public function __construct(Template &$viewTemplate, User $user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'My Gallery';

        $gal = new BlogPost(new Database());
        $this->view->gallery = $gal->loadAllGallery();

        $this->view->deleteToken = $gal->generateFormToken('deletePost');

        $this->view->content = $this->view->render('/panel/gallery-manager.php');
    }

}

?>
