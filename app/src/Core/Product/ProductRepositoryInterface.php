<?php
namespace RenePenner\StateLessShop\Core\Product;

use RenePenner\StateLessShop\Core\Number\Integer;

interface ProductRepositoryInterface
{
    /**
     * @param Integer $id
     * @return Product
     */
    public function get(Integer $id);

    /**
     * @param Product $product
     * @return void
     */
    public function add(Product $product);

    /**
     * @param Integer $id
     * @return void
     */
    public function del(Integer $id);
}
