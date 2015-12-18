<?php
namespace RenePenner\StateLessShop\Core;

/**
 * Class Customer
 *
 * EntityObject
 *
 * @package RenePenner\StateLessShop\Core
 */
class Customer
{
    /**
     * @var Address $billingAddress
     */
    private $billingAddress;

    /**
     * @var Address $shippingAddress
     */
    private $shippingAddress;

    /**
     * Customer constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }
}
