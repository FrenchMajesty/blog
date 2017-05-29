<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;

use Model\User;

class BloggerDetails extends Views {

    public function __construct(Template &$viewTemplate, User &$user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'My Details';


        $this->view->updateDetailsToken = User::generateFormToken('updateDetails');

        $this->view->content = $this->view->render('/panel/my-details.php');
    }

}

?>
