<?php

namespace Model\Entities;

use App\Entity;

final class Poste extends Entity
{

    private $id;
    private $message;
    private $datecreation;
    private $user;
    private $topic;


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

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     */
    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }


    public function getCreationdate()
    {
        $formattedDate = $this->datecreation->format("d/m/Y, H:i:s");
        return $formattedDate;
    }

    public function setCreationdate($date)
    {
        $this->datecreation = new \DateTime($date);
        return $this;
    }


    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }



    /**
     * Get the value of topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     */
    public function setTopic($topic): self
    {
        $this->topic = $topic;

        return $this;
    }
}
