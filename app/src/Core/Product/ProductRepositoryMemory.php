<?php
namespace RenePenner\StateLessShop\Core\Product;

use RenePenner\StateLessShop\Core\Number\Integer;

class ProductRepositoryMemory implements ProductRepositoryInterface
{

    /**
     * holds the products
     *
     * @var array[Product]
     */
    private $products = [];

    /**
     * @param Integer $id
     * @return Product
     */
    public function get(Integer $id)
    {
        if (!array_key_exists($id->getValue(), $this->products)) {
            throw new ProductNotFoundException('Product with ID: ' . $id->getValue() . ' not Found!');
        }

        return $this->products[$id->getValue()];
    }

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product)
    {
        $nativId = $product->getId()->getValue();

        // check product already exist in Repo
        if (array_key_exists($nativId, $this->products)) {
            throw new ProductRepositoryException('Product with ID: ' . $nativId . ' already exist!');
        }

        $this->products[$nativId] = $product;
    }

    /**
     * @param Integer $id
     * @return void
     */
    public function del(Integer $id)
    {
        // TODO: Implement del() method.
    }
}
