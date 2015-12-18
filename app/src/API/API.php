<?php
namespace RenePenner\StateLessShop\API;

use RenePenner\StateLessShop\API\Controller\Catalog;
use RenePenner\StateLessShop\API\Controller\Order;

class API
{
    /**
     * @param $app \RenePenner\StateLessShop\Core\App
     */
    public function __construct($app)
    {
        $app->post('/api/order', array(Order::class, 'place'));

        $app->get('/api/catalog/products', array(Catalog::class, 'getProducts'));
    }
}
