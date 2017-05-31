<?php
namespace Views\Panel;

use Views\Views;

use Core\Template;
use Core\Database;

use Model\BlogPost;
use Model\User;

use Abraham\TwitterOAuth\TwitterOAuth;

class Dashboard extends Views {

    public function __construct(Template &$viewTemplate, User $user) {
        parent::__construct($viewTemplate);

        $this->view->thisUser = $user;
    }

    public function init() {
        $this->view->pagename = 'Dashboard';


        // Twitter API
        $consumerKey = 'vb1rUZefdU90SLlkSghbJYQQ5';
        $consumerSecret = 'LePUZBIabK7zGSBkeGV94cL8cfigNx2nvCIuFFCbY40DstyvgM';

        $accessToken = '726950443-DNfF61hB1MEwcfHHHeqBLC53rHxlkgwbwB4lUzKd';
        $accessSecret = 'NLat3HRNWswkWv24mDbsCx6FasvkYV1Szji8mPnatvZkD';

        $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessSecret);
        $tweets = $connection->get("statuses/user_timeline.json?screen_name=twitter&count=2");

        var_dump($tweets);

        $blog = new BlogPost(new Database());

        $this->view->recentPosts = $blog->loadLatest(5);
        $this->view->oldestPostDate = $blog->getOldestPost()->getDate();

        $this->view->content = $this->view->render('/panel/home.php');
    }

}

?>
