<?php

namespace Biglidio\PoNumber\Model\SalesOrder;

use Biglidio\PoNumber\Model\ResourceModel\SalesOrder as SalesOrderResourceModel;
use Biglidio\PoNumber\Model\SalesOrder as SalesOrderModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(SalesOrderModel::class, SalesOrderResourceModel::class);
    }
}