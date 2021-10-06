<?php

namespace Biglidio\PoNumber\Model\SalesOrder;

use Biglidio\BestSelling\Model\ResourceModel\SalesOrder as SalesOrderResourceModel;
use Biglidio\BestSelling\Model\SalesOrder as SalesOrderModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(SalesOrderModel::class, SalesOrderResourceModel::class);
    }
}