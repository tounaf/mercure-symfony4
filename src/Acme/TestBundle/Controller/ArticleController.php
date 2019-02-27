<?php
/**
 * Created by PhpStorm.
 * User: Harinjatovo
 * Date: 27/02/2019
 * Time: 12:14
 */

namespace App\Acme\TestBundle\Controller;


use App\Acme\TestBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ArticleController
 * @package App\Acme\TestBundle\Controller
 */
class ArticleController extends AbstractController
{
    /**
     * @return Response
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Article();
        $entity->setTitle("Premier article");
        $entity->setDescription("Description article");
        $em->persist($entity);
        $em->flush();
        $me = "tounaf";
        return new Response('<body>Hello world,creatd by '.$me.'</body>');
    }

    /**
     * @return Response
     */
    public function home()
    {

        $me = "tounaf";
        return new Response('<body>Hello world,creatd by '.$me.'</body>');
    }
}