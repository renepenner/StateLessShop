<?php
namespace RenePenner\StateLessShop\Core\Product;

use RenePenner\StateLessShop\Core\EntityObject\EntityObjectInterface;

interface ProductInterface extends EntityObjectInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     */
    public function setName($name);
}
