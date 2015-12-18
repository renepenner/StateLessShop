<?php
namespace RenePenner\StateLessShop\Tests\Core;

use PHPUnit_Framework_TestCase;
use RenePenner\StateLessShop\Core\Number\Integer;
use RenePenner\StateLessShop\Core\Product\Product;
use RenePenner\StateLessShop\Core\Product\ProductRepositoryMemory;

class ProductTest extends PHPUnit_Framework_TestCase
{
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
        $productRepository = new ProductRepositoryMemory();

        $product = new Product(new Integer(1));
        $product->setName('ProductA');

        $productRepository->add($product);

        $repoProduct = $productRepository->get(new Integer(1));
        $this->assertEquals($product, $repoProduct);
    }
}
