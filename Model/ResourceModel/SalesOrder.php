<?php

namespace Biglidio\PoNumber\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SalesOrder extends AbstractDb
{
    const MAIN_TABLE = 'biglidio_ponumber_sales_order';
    const ID_FIELD_NAME = 'id';
    protected $_isPkAutoIncrement = false;

    /**
     * Resource initialization
     * 
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}