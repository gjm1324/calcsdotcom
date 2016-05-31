<?php

if (PHP_OS === 'Linux'||PHP_OS === 'Unix') { include_once '../global.php'; }
else { include_once '..\global.php'; }

$action = $_GET['action'];

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
        $this->loggedIn(); 
        switch($action) {
            case 'home':
                $this->home();
                break;
            
            // Item Control functions
            case 'itemView':
                $this->itemView();
                break;
            
            // Messenger Control functions
            case 'messageCenter':
                $this->messageCenter();
                break;
                
            case 'messageComposeView':
                $this->messageComposeView();
                break;
                
            case 'messageView':
                $this->messageViewer();
                break;

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
            $user = $_SESSION['user'];
            echo "<script> var loggedIn = true; </script>";
        }
        else {
            echo "<script> var loggedIn = false; </script>";
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
        $user = NULL; 
        $className = 'home';   
        $headerContent = NAVBAR;
        $head = SYSTEM_PATH . '/view/headers/head.tpl';
        $foot = SYSTEM_PATH . '/view/headers/foot.tpl';
        $javascript = BASE_URL . '/public/js/sitescript.js';
        $stylesheet = BASE_URL . '/public/css/indexStyle.css';
        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';

    }    
     
     
    // --- Message System functions are kept in siteController for convenience.
    //     Accesses pages on the MessageController class for information. 
    
    /**
     * Displays the message center to a logged in user. 
     */
    function messageCenter()
    {
        $pageTitle = 'Message Center';
        $className = 'messageCenter';
        
        if (isset($_SESSION['user']))
        {
            $pageContent = HttpRequest::get(BASE_URL . '/message/all/' . $_SESSION['user']->get('username') . '/' . BACKEND_KEY);
        }
        else
        {
            $pageContent = 
            '<div class="panel panel-danger">
                <div class="panel-heading">
                    Error
                </div>
                <div class="panel-body">
                    You cannot view the message center if you are not logged in.<br><a href="' . BASE_URL . '">Go Home</a>
                </div>
            </div>';    
        }
        
        include_once SYSTEM_PATH .'/view/mainpages/sitePage.tpl';
    }

    /**
     * Shows the view for the message compose. 
     */
    function messageComposeView() 
    {
        $className = 'messageEditor';

        if (isset($_SESSION['user']))
        {
            if (isset($_GET['id']))
            {
                $pageTitle = 'Reply to Message';
                $replyingTo = Message::getMessageById($_GET['id']);
                $toUser = $replyingTo->get('sourceUser');
                $subject = $replyingTo->get('subject');
                $parentId = $replyingTo->get('id');
            }
            else if (isset($_GET['user']))
            {
                $toUser = $_GET['user'];
                $pageTitle = 'Message to: ' . $toUser;
            }
            else
            {
                $pageTitle = 'New Message';
            }
            
            require_once(SYSTEM_PATH . '/view/mainpages/messageEditor.tpl');
            
            $pageContent = ob_get_clean();
        }
        else
        {
            $pageContent = '<div class="panel panel-danger">
                                <div class="panel-heading">
                                    Error
                                </div>
                                <div class="panel-body">
                                    You cannot send a message if you are not logged in. <br><a href="' . BASE_URL . '">Go Home</a>
                                </div>
                            </div>';
            $javascript = BASE_URL . '/public/js/sitescript.js';
        }

        include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';        
    }

    /**
     * Retrieves a message.
     */
    function messageViewer() 
    {
        $messageId = $_GET['id'];
        $messageArray = Message::getLinkedMessages($messageId);

        $className = 'messageViewer';

        $pageContent = '<h2>Message Viewer</h2><div class="col-sm-12"><button class="btn btn-default pull-right" onclick="javascript: location = \'' . BASE_URL . '/message/new/' . $messageArray[0]->get('id') . '\';">Reply</button></div>';

        if (count($messageArray) > 0)
        {
            if (isset($_SESSION['user']))
            {
                if ($_SESSION['user']->get('username') != $messageArray[0]->get('sourceUser') && $_SESSION['user']->get('username') != $messageArray[0]->get('destUser'))
                {
                    $pageTitle = 'Message Viewer Error';
                    $pageContent = '<div class="panel panel-danger">
                            <div class="panel-heading">
                                Error
                            </div>
                            <div class="panel-body">
                                You cannot view a message that you are not a part of. <br><a href="' . BASE_URL . '">Go Home</a>
                            </div>
                        </div>';
                }
                else 
                {
                    $pageTitle = 'View Message: ' . $messageArray[0]->get('subject');
                    $pageContent .= HttpRequest::get(BASE_URL . '/message/get/' . $messageId . '/' . BACKEND_KEY);
                    
                    for ($i = 1; $i < count($messageArray); $i += 1)
                    {
                        $pageContent .= '<label>Previous Message:</label><br />' . HttpRequest::get(BASE_URL . '/message/get/' . $i . '/' .BACKEND_KEY);
                    }
                }
            }
            else
            {
                $pageTitle = 'Message Viewer Error';
                $pageContent = 
                    '<div class="panel panel-danger">
                        <div class="panel-heading">
                            Error
                        </div>
                        <div class="panel-body">
                            You cannot view a message if you are not logged in. <br><a href="' . BASE_URL . '">Go Home</a>
                        </div>
                    </div>';
            }
            
            $stylesheet = BASE_URL . '/public/css/itemViewStyle.css';
            $javascript = BASE_URL . '/public/js/sitescript.js';

            include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
        }
        else
        {
            $pageTitle = 'Message Viewer Error';
            
            $pageContent = 
                '<div class="panel panel-danger">
                    <div class="panel-heading">
                        Error
                    </div>
                    <div class="panel-body">
                        The ID you specified does not have any messages associated with it. <br><a href="' . BASE_URL . '">Go Home</a>
                    </div>
                </div>';
            
            $stylesheet = BASE_URL . '/public/css/itemViewStyle.css';
            $javascript = BASE_URL . '/public/js/sitescript.js';

            include_once SYSTEM_PATH . '/view/mainpages/sitePage.tpl';
        }
    }
}
    
?>