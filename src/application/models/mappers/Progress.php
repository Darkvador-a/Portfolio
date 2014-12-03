<?php

class Model_Mapper_Progress
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

    public function save($user)
    {
        $row = $this->objectToRow($user);
        if ((int) $user->getId() === 0) {
            unset($row[Model_DbTable_Progress::COL_ID]);
            return $this->getDbTable()->insert($row);
        } else {
            $where = array(
                Model_DbTable_Progress::COL_ID . ' = ?' => $user->getId()
            );
            return $this->getDbTable()->update($row, $where);
        }
    }

    public function getDbTable()
    {
        if ($this->dbTable === null) {
            $this->dbTable = new Model_DbTable_Progress();
        }
        return $this->dbTable;
    }

    public function objectToRow(Model_Progress $progress)
    {
        return array(
             Model_DbTable_Progress::COL_ID => $progress->getId(),
             Model_DbTable_Progress::COL_TITLE => $progress->getTitle(),
             Model_DbTable_Progress:: COL_DATEOFSTART => $progress->getDateOfStart(),
             Model_DbTable_Progress:: COL_DATEOFEND => $progress->getDateOfEnd(),
             Model_DbTable_Progress:: COL_COMPANY => $progress->getCompany(),
             Model_DbTable_Progress:: COL_PLACE => $progress->getPlace(),
             Model_DbTable_Progress:: COL_DES => $progress->getDes(),
             Model_DbTable_Progress:: COL_TECHNO => $progress->getTechno(),
             Model_DbTable_Progress:: COL_TYPE => $progress->getType(),
        );
    }

    public function rowToObject($row)
    {
       $progress = new Model_Progress();
       $progress->setId($row[Model_DbTable_Progress::COL_ID ]);
       $progress->setTitle($row[Model_DbTable_Progress::COL_TITLE ]);
       $progress->setDateOfStart($row[Model_DbTable_Progress::COL_DATEOFSTART ]);
       $progress->setDateOfEnd($row[Model_DbTable_Progress::COL_DATEOFEND ]);
       $progress->setCompany($row[Model_DbTable_Progress::COL_COMPANY ]);
       $progress->setPlace($row[Model_DbTable_Progress::COL_PLACE]);
       $progress->setDes($row[Model_DbTable_Progress::COL_DES ]);
       $progress->setTechno($row[Model_DbTable_Progress::COL_TECHNO ]);
       $progress->setType($row[Model_DbTable_Progress::COL_TYPE ]);
        
        return $progress;
    }
}