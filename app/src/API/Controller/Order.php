<?php
namespace RenePenner\StateLessShop\API\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class Order
{
    public static function place(Request $request, Response $response)
    {
        $response->write("API ORDER");
        return $response;
    }
}
