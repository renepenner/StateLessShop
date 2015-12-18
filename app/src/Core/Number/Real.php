<?php
namespace RenePenner\StateLessShop\Core\Number;

use RenePenner\StateLessShop\Core\ValueObject\ValueObjectInterface;
use RenePenner\StateLessShop\Core\ValueObject\ValueObjectTrait;

abstract class Real implements ValueObjectInterface
{
    use ValueObjectTrait;

    public function gt(Integer $obj)
    {
        return $this->getValue() > $obj->getValue();
    }

    public function lt(Integer $obj)
    {
        return $this->getValue() < $obj->getValue();
    }
}
