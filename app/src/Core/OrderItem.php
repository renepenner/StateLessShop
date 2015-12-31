<?php
namespace RenePenner\StateLessShop\Core;

use RenePenner\StateLessShop\Core\Number\Integer;
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
     * @param Integer $qty
     */
    public function __construct(Product $product, Integer $qty)
    {
        $this->product = $product;
        $this->qty = $qty;
    }
}
