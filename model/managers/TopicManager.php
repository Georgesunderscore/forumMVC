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
}
