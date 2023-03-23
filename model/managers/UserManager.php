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

        return $this->getOneOrNullResult(
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

        return $this->getOneOrNullResult(
            DAO::select($sql, ['user' => $user], false),
            $this->className
        );
    }



    public function addUser($email, $pseudo, $psw, $role,$image)
    {
        $userManager = new UserManager;
        $data = ['email' => $email, 'pseudonyme' => $pseudo, 'password' => $psw
        , 'role' => $role
        ,'profileimgurl'=>$image];
        // var_dump($data);
        // die();
        if ($email && $psw) {
            $last = $userManager->add($data);
        }
    }

    public function updateUserStatus($idUser, $role)
    {
        $userManager = new UserManager;
        $data = ['id_User' => $idUser, 'role' => $role];
        if ($idUser != null && $role != null) {
            $last = $userManager->update($data);
        }
    }

}
