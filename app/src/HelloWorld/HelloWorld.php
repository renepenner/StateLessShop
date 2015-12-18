<?php
namespace RenePenner\StateLessShop\HelloWorld;

use Slim\Http\Response;

class HelloWorld
{
    /**
     * @param $app \RenePenner\StateLessShop\Core\App
     */
    public function __construct($app)
    {
        $app->get('/', function ($request, $response, $args) {
            /** @var $response Response */
            $response->write("Hello World");
            return $response;
        });
    }
}
