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


    public function findPostsByTopic($id, $order)
    {
        $orderQuery = ($order) ? "ORDER BY  p." . $order[0] : "";
        $sql = "select *
                from " . $this->tableName . " p
                where p.topic_id = :id
                $orderQuery DESC ";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }

}
