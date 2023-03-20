<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;

use Model\Managers\userManager;

class SecurityController extends AbstractController implements ControllerInterface
{
    //by default list all user if admin 
    public function index()
    {

        //if is admin get list of users 
        // $userManager = new UserManager();

        // return [
        //     "view" => VIEW_DIR . "security/listUsers.php",
        //     "data" => [
        //         "topics" => $userManager->findAll(["dateinscription", "DESC"])
        //     ]
        // ];
    }


    public function login()
    {
        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => [
                "" => ""
            ]
        ];
    }

    public function register()
    {

        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => [
                "" => ""
            ]
        ];
    }


    //adduser

    public function addUser()
    {
        if (isset($_POST['submit'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);

            $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_SPECIAL_CHARS);
            $pswrepeat = filter_input(INPUT_POST, 'psw-repeat', FILTER_SANITIZE_SPECIAL_CHARS);


            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);

            // $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS);
            // $remember = filter_input(INPUT_POST, 'remember', FILTER_SANITIZE_SPECIAL_CHARS);

            $user = 1;

            $userManager = new UserManager;
            $userManager->addUser($email, $pseudo, $psw, $pswrepeat, $role);

            
            $this->redirectTo('security', 'login');

            // return [
            //     "view" => VIEW_DIR . "forum/listTopics.php",
            //     "data" => [
            //         "topics" => $topicManager->findAll(["dateCreation", "DESC"])
            //     ]
            // ];

        }
    }
}
