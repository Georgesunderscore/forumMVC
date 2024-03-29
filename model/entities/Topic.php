<?php

namespace Model\Entities;

use App\Entity;

final class Topic extends Entity
{

        private $id;
        private $title;
        private $dateCreation;
        private $locked;
        private $sujet;

        private $user;
        private $category;

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
         * Get the value of title
         */
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */
        public function setTitle($title)
        {
                $this->title = $title;

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
         *
         * @return  self
         */
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function getDateCreation()
        {
                $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setDateCreation($date)
        {
                $this->dateCreation = new \DateTime($date);
                return $this;
        }




        /**
         * Get the value of category
         */
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        /**
         * Get the value of sujet
         */
        public function getSujet()
        {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         *
         * @return  self
         */
        public function setSujet($sujet)
        {
                $this->sujet = $sujet;

                return $this;
        }

        /**
         * Get the value of locked
         */
        public function getLocked()
        {
                return $this->locked;
        }

        /**
         * Set the value of locked
         */
        public function setLocked($locked): self
        {
                $this->locked = $locked;

                return $this;
        }
}
