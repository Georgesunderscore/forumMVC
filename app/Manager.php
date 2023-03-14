<?php

namespace App;

abstract class Manager
{
    //possible que je peut ajouter 
    // protected $className;
    // protected $tableName;
    //public final function __construct(){}
    //possible que je peut ajouter 

    protected function connect()
    {
        DAO::connect();
    }

    /**
     * get all the records of a table, sorted by optionnal field and order
     * 
     * @param array $order an array with field and order option
     * @return Collection a collection of objects hydrated by DAO, which are results of the request sent
     */
    public function findAll($order = null)
    {

        $orderQuery = ($order) ?
            "ORDER BY " . $order[0] . " " . $order[1] :
            "";

        $sql = "SELECT *
                    FROM " . $this->tableName . " a
                    " . $orderQuery;

        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }

    public function findOneById($id)
    {

        $sql = "SELECT *
                    FROM " . $this->tableName . " a
                    WHERE a.id_" . $this->tableName . " = :id
                    ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], false),
            $this->className
        );
    }

    //$data = ['username' => 'Squalli', 'password' => 'dfsyfshfbzeifbqefbq', 'email' => 'sql@gmail.com'];

    public function add($data)
    {
        //$keys = ['username' , 'password', 'email']
        $keys = array_keys($data);
        //$values = ['Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com']
        $values = array_values($data);
        //"username,password,email"
        $sql = "INSERT INTO " . $this->tableName . "
                    (" . implode(',', $keys) . ") 
                    VALUES
                    ('" . implode("','", $values) . "')";
        //"'Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com'"
        /*
                INSERT INTO user (username,password,email) VALUES ('Squalli', 'dfsyfshfbzeifbqefbq', 'sql@gmail.com') 
            */
        try {
            return DAO::insert($sql);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "
                    WHERE id_" . $this->tableName . " = :id
                    ";

        return DAO::delete($sql, ['id' => $id]);
    }

    private function generate($rows, $class)
    {
        foreach ($rows as $row) {
            yield new $class($row);
        }
    }

    protected function getMultipleResults($rows, $class)
    {

        if (is_iterable($rows)) {
            return $this->generate($rows, $class);
        } else return null;
    }

    protected function getOneOrNullResult($row, $class)
    {

        if ($row != null) {
            return new $class($row);
        }
        return false;
    }

    protected function getSingleScalarResult($row)
    {

        if ($row != null) {
            $value = array_values($row);
            return $value[0];
        }
        return false;
    }

    /**
     * Get the value of className
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set the value of className
     */
    public function setClassName($className): self
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Get the value of tableName
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set the value of tableName
     */
    public function setTableName($tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }
}
