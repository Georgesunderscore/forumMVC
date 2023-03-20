<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager
{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";


    public function __construct()
    {
        parent::connect();
    }

    public function findOneByEmail($email)
    {
        $sql = "select *
            from " . $this->tableName . " u
            where u.email = :email";

        return $this->getOnOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }

    //get user by pseudonyme
    public function findOneByUser($user)
    {
        $sql = "select *
            from " . $this->tableName . " u
            where u.pseudonyme = :user";

        return $this->getOnOrNullResult(
            DAO::select($sql, ['user' => $user], false),
            $this->className
        );
    }

    // public function addUser($email, $pseudo, $psw, $pswrepeat, $role)
    // {
    //     //validate email and $pseudo

    //     if($email && $pseudo && $psw){
    //         $userManager = new UserManager();
    //         //mail nexiste pas
    //         if($userManager->findOneByEmail($email)){
    //             //if name exist pas
    //             if($userManager->findOneByUser($pseudo)){
    //                 if (($psw == $pswrepeat)) and strlen 


    //         }

    //     }



    // }
}
