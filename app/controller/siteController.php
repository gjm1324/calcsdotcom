<?php

if (PHP_OS === 'Linux'||PHP_OS === 'Unix') { include_once '../global.php'; }
else { include_once '..\global.php'; }

$action = $_GET['action'];
session_start();
$sc = new SiteController();
$sc->route($action);

class SiteController {
   /**
    * Routes the user to the correct page. 
    * 
    * Parameters: 
    * - $action: the action that should be performed for the SiteController class. 
    */
    public function route($action) {
        if($this->loggedIn()){
            switch($action) {
                case 'home':
                    $this->home();
                    break;
                case 'signup':
                    $this->signup();
                    break;
                case 'myaccount':
                    $this->myaccount();
                    break;
                case 'recentlyused':
                    $this->recentlyused();
                    break;
                case 'favorites':
                    $this->favorites();
                    break;
                case 'browse':
                    $this->browse();
                    break;
                case 'mycalcs':
                    $this->mycalcs();
                    break;
                case 'calcfactory':
                    $this->calcfactory();
                    break;

            }
        }
        else {
            switch($action) {
                case 'home':
                    $this->home();
                    break;
                
                // Item Control functions
                case 'signup':
                    $this->signup();
                    break;

                default:
                    $this->home();
                    break;
            }
        }
    }
    /**
     * Formats the header variables. 
     */
    public function loggedIn()
    {
        /* Change homepage content if user logged in */
        if(isset($_SESSION['user']))
        {
            echo "<script> var loggedIn = true; </script>";
            return true;
        }
        else {
            echo "<script> var loggedIn = false; </script>";
            return false;
        }        
    }
   
    /**
     * Displays the home/index view to the user. 
     */
    public function home()
    {
        $pageTitle = 'Home';
        $extraContent = "";
        $selectedTab = "";
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $content = '';
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/indexStyle.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
        print_r($_SESSION);

    }

    function signup(){
        $pageTitle = 'Signup';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/signup.tpl';
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    } 

    function myaccount(){
        $pageTitle = 'My Account';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    }  

    function recentlyused(){
        $pageTitle = 'Recently Used';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    } 

    function favorites(){
        $pageTitle = 'Favorites';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    } 

    function browse(){
        $pageTitle = 'Browse';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    } 

    function mycalcs(){
        $pageTitle = 'My Calcs';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    } 

    function calcfactory(){
        $pageTitle = 'Calc Factory';
        $extraContent = "";
        $selectedTab = "none"; 
        $className = 'home';   
        $headerContent = SYSTEM_PATH . '/view/headers/navbar.tpl';
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        if($this->loggedIn()){$displayname = $_SESSION['user']->get('displayname');}
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $content = SYSTEM_PATH . '/view/mainpages/myaccount.tpl';
        $user = User::JSONtoOBJECT(HttpRequest::toString(BASE_URL.'/api/user/'.$_SESSION['user']->getId()));
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/style.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
    }    
}