<?php
namespace RenePenner\StateLessShop\Core;

use RenePenner\StateLessShop\Core\Product\Product;

/**
 * Class OrderItem
 *
 * ValueObject
 *
 * @package RenePenner\StateLessShop\Core
 */
class OrderItem
{
    /** @var Product $product */
    private $product;

    /** @var int $qty */
    private $qty;

    /**
     * OrderItem constructor.
     *
     * @param Product $product
     * @param int $qty
     */
    public function __construct(Product $product, $qty)
    {
        $this->product = $product;
        $this->qty = $qty;
    }
}
