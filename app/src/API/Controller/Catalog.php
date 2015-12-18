<?php
namespace RenePenner\StateLessShop\API\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * The Catalog API Controller provides an Endpoint for Catalog Data
 *
 * Class Catalog
 * @package RenePenner\StateLessShop\API\Controller
 */
class Catalog
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public static function getProducts(Request $request, Response $response)
    {

        $response->write("API Products");
        return $response;
    }
}
