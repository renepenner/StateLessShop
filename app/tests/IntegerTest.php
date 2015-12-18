<?php
namespace RenePenner\StateLessShop\Tests\Core;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PHPUnit_Framework_TestCase;
use RenePenner\StateLessShop\Core\Number\Integer;
use stdClass;

class IntegerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createNumberObject()
    {
        $integer = new Integer(2);

        $this->assertInstanceOf(Integer::class, $integer);
    }

    /**
     * @test
     * @expectedException RenePenner\StateLessShop\Core\Immutable\ImmutableException
     */
    public function useMagicSetterToModifiyObject()
    {
        $integer = new Integer(2);
        $integer->integer = 3;
    }

    /**
     * @test
     * @expectedException RenePenner\StateLessShop\Core\Immutable\ImmutableException
     */
    public function useConstructorToModifiyObject()
    {
        $integer = new Integer(4);
        $integer->__construct(5);
    }

    /**
     * @test
     * @expectedException RenePenner\StateLessShop\Core\ValueObject\ValueObjectException
     */
    public function useMagicCloneFunctionToModifiyObject()
    {
        $integer = new Integer(2);
        $otherInteger = clone $integer;
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useIlligalStringValueForInteger()
    {
        new Integer('43 €');
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useIlligalBooleanValueForInteger()
    {
        new Integer(true);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useIlligalFloatValueForInteger()
    {
        new Integer(23.5);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useIlligalArrayValueForInteger()
    {
        new Integer(array(34,34));
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useIlligalObjectValueForInteger()
    {
        $obj = new stdClass();
        new Integer($obj);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function useNullObjectValueForInteger()
    {
        new Integer(null);
    }

    /**
     * @test
     */
    public function compareToDifferentIntegers()
    {
        $a = new Integer(42);
        $b = new Integer(42);
        $c = new Integer(23);

        $this->assertTrue($a->equals($b));
        $this->assertFalse($a->equals($c));

        $this->assertTrue($a->gt($c));
        $this->assertTrue($c->lt($a));

    }
}
