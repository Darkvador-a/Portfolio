<?php 

class Service_OtherWork
{
    private $otherworkMapper;
    
    public function getOtherWorkMapper()
    {
        if (null === $this->otherworkMapper){
            $this->otherworkMapper = new Model_Mapper_OtherWork();
        }
        return $this->otherworkMapper;
    }
    
    public function find($id)
    {
        $cache = Zend_Controller_Front::getInstance()
                    ->getParam('bootstrap')
                    ->getResource('cachemanager')
                    ->getCache('data1');
        
        if (!$otherwork = $cache->load('otherwork'.$id)) {
            $otherwork = $this->getOtherWorkMapper()->find($id);
            $cache->save($otherwork);
        }
        return $otherwork;
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getOtherWorkMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function delete($id)
    {
        return $this->getOtherWorkMapper()->delete($id);
    }
    
    public function save($otherwork)
    {
        return $this->getOtherWorkMapper()->save($otherwork);
    }
}