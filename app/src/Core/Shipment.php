<?php
namespace RenePenner\StateLessShop\Core;

/**
 * Class Shipment
 *
 * EntityObject
 *
 * @package RenePenner\StateLessShop\Core
 */
class Shipment
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var OrderItemCollection
     */
    private $orderItems;

    /**
     * Shipment constructor.
     *
     * @param Customer $customer
     * @param OrderItemCollection $orderItems
     */
    public function __construct(Customer $customer, OrderItemCollection $orderItems)
    {
        $this->address = $customer->getShippingAddress();
        $this->orderItems = $orderItems;
    }

    public function getOrderItems()
    {
        return $this->orderItems;
    }
}
