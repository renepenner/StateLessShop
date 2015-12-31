<?php
namespace RenePenner\StateLessShop\Tests\Core;

use PHPUnit_Framework_TestCase;
use Pimple\Container;
use RenePenner\StateLessShop\Core\Number\Integer;
use RenePenner\StateLessShop\Core\Product\Product;
use RenePenner\StateLessShop\Core\Product\ProductRepositoryMemory;

class ProductTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var Container
     */
    protected $container;

    protected function setUp()
    {
        $this->container = new Container();
        $this->container['ProductRepository'] = new ProductRepositoryMemory();
    }

    /**
     * @test
     */
    public function createProduct()
    {
        $p = new Product(new Integer(1));
        $p->setName('ProductA');

        $this->assertEquals('ProductA', $p->getName());
    }

    /**
     * @test
     */
    public function addProductToProductRepository()
    {
        $productRepository = $this->container['ProductRepository'];

        $product = new Product(new Integer(1));
        $product->setName('ProductA');

        $productRepository->add($product);

        $repoProduct = $productRepository->get(new Integer(1));
        $this->assertEquals($product, $repoProduct);
    }
}
