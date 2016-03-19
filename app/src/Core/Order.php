<?php
namespace RenePenner\StateLessShop\Core;

/**
 * The Order Class represents an valid Order
 *
 * EntityObject
 *
 * Class Order
 * @package RenePenner\StateLessShop\Core\Model
 */
class Order
{
    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var OrderItemCollection
     */
    private $orderItems;

    /**
     * @var OrderState $orderState
     */
    private $orderState;

    /**
     * @var Invoice $invoice
     */
    private $invoice;

    /**
     * @var Shipment $shipment
     */
    private $shipment;

    /**
     * create a new Order withs a Customer and an OrderItemCollection
     *
     * ACC:
     *  - An Order must have a Customer
     *  - An Order must have a Set of OrderItems (an OrderItemCollection)
     *  - An Order must have an OrderState
     *
     * @param Customer $customer
     * @param OrderItemCollection $orderItems
     * @param OrderState|null $orderState
     */
    public function __construct(
        Customer $customer,
        OrderItemCollection $orderItems,
        OrderState $orderState = null
    ) {
    
        $this->customer = $customer;
        $this->orderItems = $orderItems;
        $this->orderState = $orderState == null ? OrderState::getInstance() : $orderState;
    }


    /**
     * invoice the Order
     *
     * @param Invoice $invoice
     */
    public function invoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->orderState = OrderState::getInstance(OrderState::ORDER_STATE_PENDING);
    }


    /**
     * pay a created Order
     *
     * ACC:
     *  - Order totals muss by greater then 0
     */
    public function pay()
    {
        $this->orderState = OrderState::getInstance(OrderState::ORDER_STATE_PROCESSING);
    }

    /**
     * ship products within the order
     *
     * ACC:
     *  -
     */
    public function ship(Shipment $shipment)
    {
        if (count($shipment->getOrderItems()) <= 0) {
            throw new LogicException("Can not ship, because there are no items in this order");
        }

        $this->shipment = $shipment;
        $this->orderState = OrderState::getInstance(OrderState::ORDER_STATE_COMPLETE);
    }

    /**
     * @return OrderState
     */
    public function getOrderState()
    {
        return $this->orderState;
    }

    /**
     * @return OrderItemCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
