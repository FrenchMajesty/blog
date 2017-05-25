<?php
namespace Views\Panel;

use Views\Views;
use Core\Template;
use Model\User;

class Login extends Views {

    public function __construct(Template &$viewTemplate, User $user) {
        parent::__construct($viewTemplate);

        if($user->isLoggedIn())
            $user->redirectTo('panel/');
    }

    public function init() {
        $this->view->pagename = 'Log in';
        $this->view->loginToken = User::generateFormToken('login');

        echo $this->view->render('/panel/login.php');
    }

}

?>

