<?php

class Model_Category
{
    /**
     * Identifiant
     * @var integer $id
     */
    private $id;
    
    /**
     * Label 
     * @var string $name
     */
    private $name;

    public function __construct($id, $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    /**
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param integer $id            
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param string $name            
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}