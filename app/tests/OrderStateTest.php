<?php
namespace RenePenner\StateLessShop\Tests\Core;

use LogicException;
use RenePenner\StateLessShop\Core\OrderState;

class OrderStateTest extends \PHPUnit_Framework_TestCase
{

    /**
     * A new OrderState default State is 'new'
     *
     * @test
     */
    public function initNewOrderState()
    {
        // Arrange
        $orderState = OrderState::getInstance();

        // Act

        // Assert
        $this->assertEquals($orderState, 'new');
    }


    /**
     * @test
     * @expectedException LogicException
     */
    public function orderStateCanNotChanged()
    {
        // Arrange
        $orderState = OrderState::getInstance();

        // Act
        $orderState->value = 'invalid Value';
    }

    /**
     * @test
     */
    public function canCompareOrderStates()
    {
        // Arrange
        $orderStateA = OrderState::getInstance(OrderState::ORDER_STATE_PENDING);
        $orderStateB = OrderState::getInstance(OrderState::ORDER_STATE_PENDING);
        $orderStateC = OrderState::getInstance(OrderState::ORDER_STATE_COMPLETE);
        // Act

        // Assert
        $this->assertTrue($orderStateA === $orderStateB);
        $this->assertTrue($orderStateA !== $orderStateC);
    }
}
