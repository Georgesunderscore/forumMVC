<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager
{

    protected $className = "Model\Entities\Post";
    protected $tableName = "poste";


    public function __construct()
    {
        parent::connect();
    }

    public function findPostsByTopic($id)
    {

        $sql = "select *
                from " . $this->tableName . " p
                where p.topic_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
