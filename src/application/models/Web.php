<?php

class Model_Web
{

    /**
     * Identifiant
     *
     * @var integer
     */
    private $id;

    /**
     * Titre
     *
     * @var string
     */
    private $title;

    /**
     * Lien URL
     *
     * @var string
     */
    private $url;

    /**
     * Fonctionnalité
     *
     * @var string
     */
    private $feature;

    /**
     * Langage
     *
     * @var string
     */
    private $language;

    /**
     * Image du site
     *
     * @var string
     */
    private $upload;

    /**
     * Description
     *
     * @var string
     */
    private $description;

    /**
     * Technologie
     *
     * @var string
     */
    private $technology;

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
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @return the $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     * @return the $feature
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     *
     * @return the $language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     *
     * @return the $upload
     */
    public function getUpload()
    {
        return $this->upload;
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
     * @return the $technology
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     *
     * @param number $id            
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param string $title            
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     *
     * @param string $url            
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     *
     * @param string $feature            
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;
        return $this;
    }

    /**
     *
     * @param string $language            
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     *
     * @param string $upload            
     */
    public function setUpload($upload)
    {
        $this->upload = $upload;
        return $this;
    }

    /**
     *
     * @param string $description            
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     *
     * @param string $technology            
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
        return $this;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'url' => $this->getUrl(),
            'feature' => $this->getFeature(),
            'language' => $this->getLanguage(),
            'upload' => $this->getUpload(),
            'description' => $this->getDescription(),
            'technology' => $this->getTechnology()
        );
    }
} 