<?php

class Model_Mapper_OtherWork
{

    private $dbTable;

    public function find($id)
    {
        $rowSet = $this->getDbTable()->find($id);
        if (0 == count($rowSet->current())) {
            return false;
        }
        return $this->rowToObject($rowSet->current());
    }

    public function fetchAll($where = null, $order = null, $count = null, $offset = null)
    {
        $rowSet = $this->getDbTable()->fetchAll($where, $order, $count, $offset);
        $entities = array();
        foreach ($rowSet as $row) {
            $entities[] = $this->rowToObject($row);
        }
        return $entities;
    }

    public function delete($id)
    {
        $row = $this->getDbTable()
            ->find($id)
            ->current();
        if (! $row instanceof Zend_Db_Table_Row_Abstract) {
            return false;
        }
        return $row->delete();
    }

    public function save($otherwork)
    {
        $row = $this->objectToRow($otherwork);
        if ((int) $otherwork->getId() === 0) {
            unset($row[Model_DbTable_OtherWork::COL_ID]);
            return $this->getDbTable()->insert($row);
        } else {
            $where = array(
                Model_DbTable_OtherWork::COL_ID . ' = ?' => $otherwork->getId()
            );
            return $this->getDbTable()->update($row, $where);
        }
    }

    public function getDbTable()
    {
        if ($this->dbTable === null) {
            $this->dbTable = new Model_DbTable_OtherWork();
        }
        return $this->dbTable;
    }

    public function objectToRow($otherwork)
    {
        return array(
            Model_DbTable_OtherWork::COL_ID => $otherwork->getId(),
            Model_DbTable_OtherWork::COL_NAME => $otherwork->getName(),
            Model_DbTable_OtherWork::COL_PICTURE => $otherwork->getPicture(),
            Model_DbTable_OtherWork::COL_TECHNO => $otherwork->getTechnology(),
            Model_DbTable_OtherWork::COL_DESCRIPTION => $otherwork->getName(),
            Model_DbTable_OtherWork::COL_LINK => $otherwork->getLink()
        );
    }

    public function rowToObject($row)
    {
        $otherwork = new Model_OtherWork();
        
        $otherwork->setId($row[Model_DbTable_OtherWork::COL_ID]);
        $otherwork->setName($row[Model_DbTable_OtherWork::COL_NAME]);
        $otherwork->setPicture($row[Model_DbTable_OtherWork::COL_PICTURE]);
        $otherwork->setTechnology($row[Model_DbTable_OtherWork::COL_TECHNOLOGY]);
        $otherwork->setDescription($row[Model_DbTable_OtherWork::COL_DESCRIPTION]);
        $otherwork->setLink($row[Model_DbTable_OtherWork::COL_LINK]);
        
        return $otherwork;
    }
}