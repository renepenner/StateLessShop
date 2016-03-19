<?php
namespace RenePenner\StateLessShop\Core\Product;

use RenePenner\StateLessShop\Core\Number\Integer;

/**
 * Class Product
 *
 * EntityObject
 *
 * @package RenePenner\StateLessShop\Core
 */
class Product implements ProductInterface
{

    /**
     * @var Integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Product constructor.
     * @param int $id
     */
    public function __construct(Integer $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
