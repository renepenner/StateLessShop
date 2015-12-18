<?php
namespace RenePenner\StateLessShop\Core;

/**
 * Class Price
 *
 * Value Object
 *
 * @package RenePenner\StateLessShop\Core
 */
class Price
{
    private $amount;

    private $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}
