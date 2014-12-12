<?php

class Model_Mapper_Category
{

    private $tabCategories = array(
        'Technologie',
        'Langage',
        'Plateforme'
    );

    private $tabCategorieTechnologie = array(
        '1' => 'Zend',
        '2' => 'Symfony',
        '3' => 'Wordpress',
        '4' => 'CakePHP',
        '5' => 'Prestashop'
    );

    private $tabCategorieLangage = array(
        '6' => 'PHP',
        '7' => 'Javascript',
        '8' => 'HTML',
        '9' => 'CSS3',
        '10' => 'Less',
        '11' => 'Saas'
    );

    private $tabCategoriePlateforme = array(
        '12' => 'Linux',
        '13' => 'Windows',
        '14' => 'Mac'
    );

    public function getById($id)
    {
        switch (TRUE) {
            case array_key_exists($id, $this->tabCategorieTechnologie):
                $category = new Model_Category($id, $this->tabCategorieTechnologie[$id]);
                break;
            case array_key_exists($id, $this->tabCategorieLangage):
                $category = new Model_Category($id, $this->tabCategorieLangage[$id]);
                break;
            case array_key_exists($id, $this->tabCategoriePlateforme):
                $category = new Model_Category($id, $this->tabCategoriePlateforme[$id]);
                break;
            default:
                $category = null;
        }
        return $category;
    }

    public function getList()
    {
        return $this->tabCategories;
    }

    public function fetchAll()
    {
        $tabSubCategories = array();
        
        foreach ($this->tabCategories as $categorie) {
            $var = 'tabCategorie' . ucfirst($categorie);
            $tabSubCategories[$categorie] = $this->$var;
        }
        
        return $tabSubCategories;
    }
}
