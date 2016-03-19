<?php
namespace RenePenner\StateLessShop\Core\Immutable;

/**
 * Class ImmutableTrait
 * @package RenePenner\StateLessShop\Core\Immutable
 */
trait ImmutableTrait
{

    /** @var bool $constructed */
    private $constructed = false;

    /**
     * ImmutableTrait constructor.
     *
     * @throws ImmutableException
     */
    public function setConstructed()
    {
        if ($this->constructed === true) {
            throw new ImmutableException('Can not recall constructor again because this object is immutable.');
        }

        $this->constructed = true;
    }

    /**
     * Disable the magic function to prevent change the immutable object
     *
     * @param $name
     * @param $value
     */
    final public function __set($name, $value)
    {
        throw new ImmutableException('Can not set any value because this object is immutable.');
    }
}
