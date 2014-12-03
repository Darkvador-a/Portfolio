<?php 

class Service_Progress
{
    private $progressMapper;
    
    public function getProgressrMapper()
    {
        if (null === $this->progressMapper){
            $this->progressMapper = new Model_Mapper_Progress();
        }
        return $this->progressMapper;
    }
    
    public function find($id)
    {
        $cache = Zend_Controller_Front::getInstance()
                    ->getParam('bootstrap')
                    ->getResource('cachemanager')
                    ->getCache('data1');
        
        if (!$progress = $cache->load('progress'.$id)) {
            $progress = $this->getProgressrMapper()->find($id);
            $cache->save($progress);
        }
        return $progress;
    }
    
    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        return $this->getProgressrMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    public function delete($id)
    {
        return $this->getProgressrMapper()->delete($id);
    }
    
    public function save($progress)
    {
        return $this->getProgressrMapper()->save($progress);
    }
    
   
}