<?php

namespace Biglidio\PoNumber\Plugin;

use Biglidio\PoNumber\Model\SalesOrder\Collection;
use Biglidio\PoNumber\Model\SalesOrder\CollectionFactory;
use Magento\Sales\Api\OrderRepositoryInterface;

class AddPoNumberToSalesOrder
{
    protected $biglidioSalesOrderCollectionFactory;

    /**
     * AddPoNumberToSalesOrder constructor.
     * @param CollectionFactory $biglidioSalesOrderCollectionFactory
     */
    public function __construct(
        CollectionFactory $biglidioSalesOrderCollectionFactory
    ) {
        $this->biglidioSalesOrderCollectionFactory = $biglidioSalesOrderCollectionFactory;
    }

    /**
     * @param OrderRepositoryInterface $subject
     * @param $result
     * @return mixed
     */
    public function afterGet(
        OrderRepositoryInterface $subject,
        $result
    ) {
        //** @var Collection $biglidioSalesOrderCollection */
        $biglidioSalesOrderCollection = $this->biglidioSalesOrderCollectionFactory->create();
        $biglidioSalesOrder = $biglidioSalesOrderCollection
            ->addFieldToFilter('order_id', $result->getId())
            ->getFirstItem();

        $extensionAttributes = $result->getExtensionAttributes();
        $extensionAttributes->setData('po_number', $biglidioSalesOrder->getData('po_number'));
        $result->setExtensionAttributes($extensionAttributes);

        return $result;
    }

    /**
     * @param OrderRepositoryInterface $subject
     * @param $result
     * @return mixed
     */
    public function afterGetList(
        OrderRepositoryInterface $subject,
        $result
    ) {
        foreach($result->getItems() as $order) {
            $this->afterGet($subject, $order);
        }

        return $result;
    }
}