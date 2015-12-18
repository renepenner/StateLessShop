<?php
namespace RenePenner\StateLessShop\Core;

use Countable;

class OrderItemCollection implements Countable
{
    /**
     * @var array of OrderItems
     */
    private $orderItems = [];

    /**
     * create an empty OrderItemCollection
     */
    public function __construct()
    {
    }

    /**
     * Adds an OrderItem to the collection
     *
     * @param OrderItem $orderItem
     */
    public function add(OrderItem $orderItem)
    {
        $this->orderItems[] = $orderItem;
    }

    /**
     * Returns an array of OrderItems
     *
     * @return array
     */
    public function getAll()
    {
        return $this->orderItems;
    }

    public function count()
    {
        $c = count($this->orderItems);
        return $c;
    }
}
