<?php
namespace RenePenner\StateLessShop\Core\ValueObject;

use RenePenner\StateLessShop\Core\Immutable\ImmutableInterface;

interface ValueObjectInterface extends ImmutableInterface
{
    public function getValue();
}
