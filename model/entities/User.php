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

    public function getDateinscription()
    {
        $formattedDate = $this->dateinscription->format("d/m/Y, H:i:s");
        return $formattedDate;
    }

    public function setDateinscription($date)
    {
        $this->dateinscription = new \DateTime($date);
        return $this;
    }

    /**
     * Get the value of pseudonyme
     */
    public function getPseudonyme()
    {
        return $this->pseudonyme;
    }

    /**
     * Set the value of pseudonyme
     */
    public function setPseudonyme($pseudonyme): self
    {
        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }
    public function hasRole($s)
    {
        if ($this->role == $s) {
            return true;
        } else {
            return false;
        }
    }
}
