<?php

namespace Biglidio\PoNumber\Model;

use Biglidio\PoNumber\Model\ResourceModel\SalesOrder as SalesOrderResourceModel;
use Magento\Framework\Model\AbstractModel;

class SalesOrder extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(SalesOrderResourceModel::class);
    }
}