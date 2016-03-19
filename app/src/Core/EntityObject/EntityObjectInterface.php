<?php
namespace RenePenner\StateLessShop\Core\EntityObject;

use RenePenner\StateLessShop\Core\Number\Integer;

/**
 * EntityObjectInterface
 *
 * Every Entity must have an Id.
 *
 * @package RenePenner\StateLessShop\Core\EntityObject
 */
interface EntityObjectInterface
{
    /**
     * @return Integer
     */
    public function getId();
}
