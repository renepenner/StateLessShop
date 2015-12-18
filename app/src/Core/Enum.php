<?php
namespace RenePenner\StateLessShop\Core;

use InvalidArgumentException;
use LogicException;
use ReflectionClass;

abstract class Enum
{
    /**
     * The selected enum value
     *
     * @var mixed
     */
    private $value;

    public static $pool = [];

    const __DEFAULT = null;

    /**
     * Enum constructor.
     *
     * @param $value    mixed   the value of the enumerator
     * @throws InvalidArgumentException On an unknwon or invalid value
     */
    private function __construct($value)
    {
        if ($value == null) {
            // get the called class (Late Static Binding)
            $class = get_called_class();
            $value = $class::__DEFAULT;
        }

        $constants = self::detectConstants(get_called_class());

        if (!in_array($value, array_values($constants))) {
            throw new InvalidArgumentException("On an unknwon or invalid value");
        }

        $this->value = $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public static function getInstance($value = null)
    {
        $class = get_called_class();
        $hash = md5($class.$value);

        if (!isset(self::$pool[$hash])) {
            self::$pool[$hash] = new $class($value);
        }
        return self::$pool[$hash];
    }

    public function __toString()
    {
        return $this->value;
    }

    /**
     * @param $name
     * @param $value
     * @throws LogicException
     */
    public function __set($name, $value)
    {
        // Enum objects are immutable
        throw new LogicException("Can not change Enum because it´s immutable");
    }

    private static function detectConstants($class)
    {
        $reflection = new ReflectionClass($class);
        $constants  = $reflection->getConstants();

        // ToDo: check ambiguous values
        while (($reflection = $reflection->getParentClass()) && $reflection->name !== __CLASS__) {
            $constants = $reflection->getConstants() + $constants;
        }

        return $constants;
    }
}
