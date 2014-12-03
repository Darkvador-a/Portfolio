<?php

class Model_Progress 
{
    /**
     * 
     * @var int
     */
    private $id;
    /**
     * 
     * @var string
     */
    private $title;
    /**
     *
     * @var date
     */
    private $dateOfStart;
    /**
     *
     * @var date
     */
    private $dateOfEnd;
    /**
     *
     * @var string
     */
    private $company;
    /**
     *
     * @var string
     */
    private $place;
    /**
     *
     * @var string
     */
    private $des;
    /**
     *
     * @var string
     */
    private $techno;
    /**
     *
     * @var int
     */
    private $type;
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

	/**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

	/**
     * @return the $dateOfStart
     */
    public function getDateOfStart()
    {
        return $this->dateOfStart;
    }

	/**
     * @param date $dateOfStart
     */
    public function setDateOfStart($dateOfStart)
    {
        $this->dateOfStart = $dateOfStart;
    }

	/**
     * @return the $dateOfEnd
     */
    public function getDateOfEnd()
    {
        return $this->dateOfEnd;
    }

	/**
     * @param date $dateOfEnd
     */
    public function setDateOfEnd($dateOfEnd)
    {
        $this->dateOfEnd = $dateOfEnd;
    }

	/**
     * @return the $company
     */
    public function getCompany()
    {
        return $this->company;
    }

	/**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

	/**
     * @return the $place
     */
    public function getPlace()
    {
        return $this->place;
    }

	/**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

	/**
     * @return the $des
     */
    public function getDes()
    {
        return $this->des;
    }

	/**
     * @param string $des
     */
    public function setDes($des)
    {
        $this->des = $des;
    }

	/**
     * @return the $techno
     */
    public function getTechno()
    {
        return $this->techno;
        
    }

	/**
     * @param string $techno
     */
    public function setTechno($techno)
    {
       
       
        $this->techno = $techno;
    }

	/**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

	/**
     * @param number $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    
    
}