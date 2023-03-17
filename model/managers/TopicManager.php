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

    public function findTopicsByCategory($id, $order)
    {
        // var_dump($id);
        // var_dump($order);

        $orderQuery = ($order) ? "ORDER BY  t." . $order[0] : "";
        // var_dump($orderQuery);
        $sql = "select *
                from " . $this->tableName . " t
                where t.category_id = :id
                $orderQuery DESC ";
        // var_dump($sql);

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
