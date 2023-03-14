<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
        //possible dappler le constructure final de labstract class
        // $this->className = "Model\Entities\Topic";
        // $this->tableName = "topic";
    }

    public function findTopicsByCategory($id)
    {

        $sql = "select *
                from " . $this->tableName . " t
                where t.category_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
