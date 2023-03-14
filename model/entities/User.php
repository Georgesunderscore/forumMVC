<?php

namespace Model\Entities;

use App\Entity;

final class User extends Entity
{

    private $id;
    private $pseudonyme;
    private $email;
    private $password;
    private $role;
    private $dateinscription;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCreationdate()
    {
        $formattedDate = $this->dateinscription->format("d/m/Y, H:i:s");
        return $formattedDate;
    }

    public function setCreationdate($date)
    {
        $this->dateinscription = new \DateTime($date);
        return $this;
    }
}
