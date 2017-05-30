<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

use Model\User;

class ContactBlogger extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'Where to Find Me';

        $this->view->updateInfosToken = User::generateFormToken('updateSocials');

        $this->view->socialMedia = $this->view->thisUser->getSocialMedias();
        $this->view->content = $this->view->render('/panel/contact-me.php');
    }

}

?>
