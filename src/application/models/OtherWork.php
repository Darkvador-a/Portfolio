<?php

class Model_OtherWork
{

    /**
     * Identifiant
     *
     * @var integer $id
     */
    private $id;

    /**
     * Picture
     *
     * @var string $picture
     */
    private $picture;

    /**
     * Label
     *
     * @var string $name
     */
    private $name;

    /**
     * Type de technology
     *
     * @var string $technology
     */
    private $technology;

    /**
     * Description
     *
     * @var string $description
     */
    private $description;

    /**
     * Lien
     *
     * @var string $link
     */
    private $link;

    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the $picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     *
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return the $technology
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     *
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @return the $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     *
     * @param field_type $id            
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param field_type $picture            
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     *
     * @param field_type $name            
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * @param field_type $technology            
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
    }

    /**
     *
     * @param field_type $description            
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * @param field_type $link            
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'technology' => $this->getTechnology(),
            'picture' => $this->getPicture(),
            'link' => $this->getLink(),
            'description' => $this->getDescription()
        );
    }
}