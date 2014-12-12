<?php

class Model_DbTable_Web extends Zend_Db_Table_Abstract
{

    const TABLE_NAME = 'web';

    const COL_ID = 'web_id';

    const COL_TITLE = 'web_title';

    const COL_URL = 'web_url';

    const COL_FEATURE = 'web_feature';

    const COL_LANGUAGE = 'web_language';

    const COL_DESCRIPTION = 'web_description';

    const COL_TECHNOLOGY = 'web_technology';

    const COL_UPLOAD = 'web_upload';

    protected $_name = self::TABLE_NAME;

    protected $_primary = self::COL_ID;
}