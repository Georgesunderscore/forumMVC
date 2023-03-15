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


}
