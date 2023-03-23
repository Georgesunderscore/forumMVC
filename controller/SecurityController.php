<?php

namespace Controller;

use App;
use App\AbstractController;
use App\ControllerInterface;
use App\Session;
use Model\Managers\userManager;
use Model\Managers\topicManager;


class SecurityController extends AbstractController implements ControllerInterface
{
    //by default list all user if admin 
    public function index()
    {

        //if is admin list all users 

        $userManager = new UserManager();
        if (App\Session::isAdmin()) {
            return [
                "view" => VIEW_DIR . "security/listUsers.php",
                "data" => [
                    "users" => $userManager->findAll(["dateinscription", "DESC"])
                ]
            ];
        } else {
            $this->redirectTo('forum', 'listTopics');
        }
    }
    public function hashPass($psw)
    {
        $md5passhash = hash('md5', $psw, false);
        return $md5passhash;
    }
    // public function listTopics()
    // {
    //     $userManager = new UserManager();


    //     return [
    //         "view" => VIEW_DIR . "security/listUsers.php",
    //         "data" => [
    //             "topics" => $userManager->findAll(["dateinscription", "DESC"]) //,


    //         ]
    //     ];
    // }

    public function login()
    {
        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => [
                "" => ""
            ]
        ];
    }
    public function viewProfile()
    {
        return [
            "view" => VIEW_DIR . "security/viewProfile.php",
            "data" => [
                "" => ""
            ]
        ];
    }
    


    public function logout()
    {
        Session::setUser(null);

        $this->redirectTo('forum', 'index');
        // Session::setUser(null);
    }






    public function authentification()
    {
        $userManager = new UserManager();
        if (isset($_POST['submitlogin'])) {

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $psw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

            //test if the user have access to
            if ($email && $psw && $email != null) {

                //hash the password
                //get the user from email and password hash

                $userbyemail = $userManager->findOneByEmail($email);

                // echo($userbyemail->getProfileimgurl());
                // die();

                if ($userbyemail != null) {
                    $hashedpass = $userbyemail->getPassword();


                    //mot compare avec le hash valider 
                    if ($this->verify($hashedpass, $psw)) {
                        if( $userbyemail->getRole()!= 'bannie' ) {
                            Session::setUser($userbyemail);
                            App\Session::addFlash("success", "Welcome to home page " . $userbyemail->getRole());
                            $this->redirectTo('security', 'index');
                        }
                        else{
                            App\Session::addFlash("error", "User Bannie " . $userbyemail->getRole());
                            $this->redirectTo('Home', 'index');
                        }
                    }
                }
            } else {
                App\Session::addFlash("error", " Login Failed Email or Password not valid");
                $this->redirectTo('security', 'login');


                // return [
                //     "view" => VIEW_DIR . "security/login.php",
                //     "data" => [
                //         "" => ""
                //     ]
                // ];
            }
        }
    }

    public function verify($passhash, $pass)
    {
        if ($this->hashPass($pass == $passhash)) {
            return true;
        } else {
            return false;
        };
        return false;
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

            //profileimgurl
            if(isset($_FILES['file'])){
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
            //Tableau des extensions que l'on accepte
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            
            $maxSize = 400000;
            if(in_array($extension, $extensions) && $size <= $maxSize  && $error == 0){
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
            
                move_uploaded_file($tmpName, './upload/'.$file);
            }
            else{
                echo "Mauvaise extension ou taille trop grande";
            }


            
            }
            // $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS);
            // $remember = filter_input(INPUT_POST, 'remember', FILTER_SANITIZE_SPECIAL_CHARS);

            $user = 1;

            //validate email and $pseudo

            if ($email != null && $pseudo != null && $psw != null) {
                echo ("5");
                // die();
                $userManager = new UserManager();
                //mail nexiste pas
                if (!$userManager->findOneByEmail($email)) {
                    echo ("6");
                    //if name exist pas
                    if (!$userManager->findOneByUser($pseudo)) {
                        echo ("7");

                        if (($psw == $pswrepeat) and strlen($psw) >= 8) {
                            echo ("8");
                            // $psw to be hached 
                            $userManager->addUser($email, $pseudo, $this->hashPass($psw), $role 
                                                    ,'./upload/'.$file);
                            echo ("9");
                            // die();

                            // return [
                            //     "view" => VIEW_DIR . "security/login.php",
                            //     "data" => [
                            //         "" => ""
                            //     ]
                            // ];
                            App\Session::addFlash("success", "Please Login after registration is successful");

                            $this->redirectTo('security', 'login');
                        } else {
                            // return [
                            //     "view" => VIEW_DIR . "security/register.php",
                            //     "data" => [
                            //         "" => ""
                            //     ]
                            // ];
                            App\Session::addFlash("error", "unmatched password or length >=8");

                            $this->redirectTo('security', 'register');
                        }
                    } else {
                        echo ("already exist");
                        App\Session::addFlash("error", "already exist");
                        $this->redirectTo('security', 'register');
                    }
                } else {
                    echo ("already exist");
                    App\Session::addFlash("error", "already exist");
                    $this->redirectTo('security', 'register');
                }
            } else {

                App\Session::addFlash("error", "Empty Not Allowed");
                $this->redirectTo('security', 'register');
            }
        } else {

            $this->redirectTo('security', 'register');
            // App\Session::addFlash("error", "Empty Not Allowed");
        }
    }



    
    public function autoriserUser($id)
    {

        $userManager = new UserManager();

        $user = $userManager->findOneById($id);
        echo ($user->getRole());

        if ($user->getRole() == 'bannie') {
            $user->setRole('membre');
        } else {
            $user->setRole('bannie');
        }
        // echo ($topic->getLocked());
        // die();
        $userManager->updateUserStatus($id, $user->getRole());

        $this->redirectTo('security', 'listUsers');
    }
}
