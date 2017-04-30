<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.17
 * Time: 17:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class NewsController extends Controller
{
    /**
     * @Route ("/news/new")
     */
    public function newAction()
    {
        $news = new News();
        $date = $news->setDate();
        $news->setTitle("Arcticle news".$date);
        $em = $this->getDoctrine()->getManager();
        $em->persist($news);
        $em->flush();
        return new Response("<html><body>Genereted!</body></html>");
    }


    /**
     * @Route ("/news")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();
        return $this->render('news/index.html.twig',['news'=>$news, 'title'=>"Новости"]);
    }


}