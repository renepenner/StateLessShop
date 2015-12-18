<?php
namespace RenePenner\StateLessShop\Core\ValueObject;

use RenePenner\StateLessShop\Core\Immutable\ImmutableTrait;

/**
 * Class ValueObjectTrait
 * @package RenePenner\StateLessShop\Core\ValueObject
 */
trait ValueObjectTrait
{

    use ImmutableTrait;

    /**
     * Disable clone function to prevent clone Value Objects
     */
    final public function __clone()
    {
        throw new ValueObjectException('ValueObjects are not cloneable');
    }

    /**
     * @param ValueObjectInterface $obj
     * @return bool
     */
    public function equals(ValueObjectInterface $obj)
    {
        if (get_called_class() !== get_class($obj)) {
            return false;
        }

        return $this->getValue() === $obj->getValue();
    }
}
