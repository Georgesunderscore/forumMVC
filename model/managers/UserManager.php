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
 

    public function addUser($email, $pseudo, $psw, $role)
    {
        $userManager = new UserManager;
        $md5passhash = hash('md5', $psw, false);
        echo "test";
        echo $md5passhash;


        $data = ['email' => $email, 'pseudonyme' => $pseudo, 'password' => $md5passhash, 'role' => $role];
        // var_dump($data);
        // die();
        if ($email && $md5passhash) {
            $last = $userManager->add($data);
        }
    }
}
