<?php
/**
 * Created by PhpStorm.
 * User: nambinina2
 * Date: 17/05/2019
 * Time: 15:01
 */

namespace App\Acme\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;

/**
 * Class PublisherController
 * @package App\Acme\TestBundle\Controller
 */
class PublisherController
{

    public function __invoke(Publisher $publisher)
    {
        $update = new Update(
//            'http://localhost:8001/books/1',
            'http://example.com/books/1',
            json_encode(['status' => 'OutOfStock'])
        );

        // The Publisher service is an invokable object
        $publisher($update);
        $response = new Response('published');
//        $response->headers->set('')
        return $response;
    }
}