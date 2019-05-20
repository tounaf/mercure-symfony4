<?php
/**
 * Created by PhpStorm.
 * User: Harinjatovo
 * Date: 27/02/2019
 * Time: 12:14
 */

namespace App\Acme\TestBundle\Controller;


use App\Acme\TestBundle\Entity\Article;
use App\Acme\TestBundle\Service\ComplexObject;
use App\Acme\TestBundle\Service\MailerLogger;
use App\Acme\TestBundle\Service\SmtpDomaine;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Routing\Annotation\Route;
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
        return  new Response('<body>Hello world,creatd by '.$me.'</body>');
//        return $this->render('@AcmeTest//Article/show_article.html.twig');
//        return $response;

    }

    /**
     * @return Response
     */
    public function home(ComplexObject $complexObject, MailerLogger $mailerLogger, SmtpDomaine $smtpDomaine)
    {
        $libele = $complexObject->doSomething();
        $email = $mailerLogger->getMailer();
        $smtp = $smtpDomaine->getSmtp();

        return $this->render('@AcmeTest/Article/show_article.html.twig');
//        return new Response('
//            <body>
//                <h1>'.$libele .' : </h1>'. '<h1>'.$email.' :</h1>'.$smtp.'
//            </body>
//        ');
//        $me = "tounaf";
//        return new Response('<body>Hello world,creatd by '.$me.'</body>');
    }

    /**
     * @param Publisher $publisher
     * @return Response
     */
    public function showBook(Publisher $publisher, Request $request)
    {
        $message = 'fetra';
        if ($request->get('message')) {

            $message = $request->get('message');
        }
//        $response = new Response('Hello');
        $update = new Update('http://monsite.com/1',json_encode(['message' => $message]));
        $publisher($update);
        return $this->render('@AcmeTest/Article/show_article.html.twig');;
    }
}