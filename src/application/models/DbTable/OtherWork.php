<?php

class Model_DbTable_OtherWork extends Zend_Db_Table_Abstract
{

    const TABLE_NAME = 'otherwork';

    const COL_ID = 'id_otherwork';

    const COL_PICTURE = 'picture';

    const COL_NAME = 'name';

    const COL_TECHNOLOGY = 'technology';

    const COL_DESCRIPTION = 'description';

    const COL_LINK = 'link';

    protected $_name = self::TABLE_NAME;

    protected $_primary = self::COL_ID;
}