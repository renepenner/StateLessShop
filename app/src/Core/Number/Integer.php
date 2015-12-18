<?php
namespace RenePenner\StateLessShop\Core\Number;

use InvalidArgumentException;

final class Integer extends Real
{
    private $integer;

    /**
     * Integer constructor.
     * @param $value int
     * @throws InvalidArgumentException
     */
    public function __construct($value)
    {
        if (is_bool($value)) {
            throw new InvalidArgumentException('Invalid Argrument. Allowed types are only int');
        }

        $value = filter_var($value, FILTER_VALIDATE_INT);
        if (false === $value) {
            throw new InvalidArgumentException('Invalid Argrument. Allowed types are only int');
        }

        $this->setConstructed();
        $this->integer = $value;
    }

    /**
     * Get the nativ representation of the ValueObject
     *
     * @return int
     */
    public function getValue()
    {
        return $this->integer;
    }
}
