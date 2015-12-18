<?php
namespace RenePenner\StateLessShop\Core;

/**
 * Class Invoice
 *
 * EntityObject
 *
 * @package RenePenner\StateLessShop\Core
 */
class Invoice
{
    /**
     * @var Address $address
     */
    private $address;

    /**
     * @var OrderItemCollection $orderItems
     */
    private $orderItems;

    /**
     * Invoice constructor.
     *
     * @param Customer $customer
     * @param OrderItemCollection $orderItems
     */
    public function __construct(Customer $customer, OrderItemCollection $orderItems)
    {
        $this->address = $customer->getBillingAddress();
        $this->orderItems = $orderItems;
    }
}
