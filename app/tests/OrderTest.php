<?php
namespace RenePenner\StateLessShop\Tests\Core;

use PHPUnit_Framework_TestCase;
use RenePenner\StateLessShop\Core\Customer;
use RenePenner\StateLessShop\Core\Invoice;
use RenePenner\StateLessShop\Core\Number\Integer;
use RenePenner\StateLessShop\Core\Order;
use RenePenner\StateLessShop\Core\OrderItem;
use RenePenner\StateLessShop\Core\OrderItemCollection;
use RenePenner\StateLessShop\Core\OrderState;
use RenePenner\StateLessShop\Core\Product\Product;
use RenePenner\StateLessShop\Core\Shipment;

class OrderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function canCreateNewOrder()
    {
        // Arrange
        $orderItemCollectionStub = $this
            ->getMockBuilder('RenePenner\StateLessShop\Core\OrderItemCollection')
            ->getMock();

        $customerStub = $this
            ->getMockBuilder('RenePenner\StateLessShop\Core\Customer')
            ->getMock();


        // Act
        $order = new Order($customerStub, $orderItemCollectionStub);

        // Assert
        $this->assertInstanceOf(Order::class, $order);
    }

    /**
     * @throws \RenePenner\StateLessShop\Core\LogicException
     * @test
     */
    public function processAnOrderDefault()
    {
        // Arrange
        $customer = new Customer();

        // empty orderItemCollection
        $orderItems = new OrderItemCollection();

        $p1 = new Product(new Integer(1));
        $item1 = new OrderItem($p1, 2);
        $orderItems->add($item1);

        $p2 = new Product(new Integer(2));
        $item2 = new OrderItem($p2, 4);
        $orderItems->add($item2);

        $orderState = OrderState::getInstance();

        // Act

        /*
         * 1. place an Order
         * 1.1 add A Customer
         * 1.2 add Order Items
         * 1.3 set Order Status to NEW
         */
        $order = new Order($customer, $orderItems, $orderState);
        $this->assertEquals(OrderState::ORDER_STATE_NEW, $order->getOrderState());

        /*
         * 2. create an Invoice for the Order
         * 2.1 attach an Invoice Object
         * 2.2 set Order Status to PENDING (waiting for payment)
         */
        $invoice = new Invoice($order->getCustomer(), $order->getOrderItems());
        $order->invoice($invoice);
        $this->assertEquals(OrderState::ORDER_STATE_PENDING, $order->getOrderState());

        /* 3. pay the Order
         * 3.1 attach an Transaction Object to the Order
         * 3.2 set Order Status to processing
         */
        $order->pay();
        $this->assertEquals(OrderState::ORDER_STATE_PROCESSING, $order->getOrderState());

        /* 4. ship the Order
         * 4.1 attach an Shipment Object to the Order
         * 4.2 set Order Status to complete
         */
        $shipment = new Shipment($customer, $order->getOrderItems());
        $order->ship($shipment);
        $this->assertEquals('complete', $order->getOrderState());
    }
}
