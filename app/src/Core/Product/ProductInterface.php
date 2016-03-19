<?php
namespace RenePenner\StateLessShop\Core\Product;

use RenePenner\StateLessShop\Core\EntityObject\EntityObjectInterface;

/**
 * ProductInterface
 *
 * @package RenePenner\StateLessShop\Core\Product
 */
interface ProductInterface extends EntityObjectInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);
}
