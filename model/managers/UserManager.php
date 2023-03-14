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

        return $this->getMultipleResults(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );
    }
}
