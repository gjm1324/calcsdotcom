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
        switch($action) {
            case 'user':
                $this->user();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'signup':
                $this->signup();
                break;
            case 'update':
                $this->update();
                break;

        }
    }

    function user(){
        $user = User::loadById($_GET['firstArg']);
        echo $user->toJSON();
    }
    function logout(){
        $_SESSION['user'] = NULL;
        session_destroy();        
        header("Location: ".BASE_URL);
        exit();
    }
    function signup(){
        $user = new User($_POST);
        $user->save();
        $_SESSION['user']=$user;
        header("Location:".BASE_URL);
    }
    function update(){
        $user = new User($_POST);
        $user->save();
        $_SESSION['user']=$user;
        header("Location:".BASE_URL."/myaccount");
    }
}