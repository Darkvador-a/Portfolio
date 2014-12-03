<?php

class Model_DbTable_Progress extends Zend_Db_Table_Abstract
{
    const TABLE_NAME = 'progress';
    
    const COL_ID = 'id';
    const COL_TITLE = 'title';
    const COL_DATEOFSTART = 'dateOfStart';
    const COL_DATEOFEND = 'dateOfEnd';
    const COL_COMPANY = 'company';
    const COL_PLACE = 'place';
    const COL_DES = 'des';
    const COL_TECHNO = 'techno';
    const COL_TYPE = 'type';
    
    protected $_name = self::TABLE_NAME;
    protected $_primary = self::COL_ID;
    
    
   }