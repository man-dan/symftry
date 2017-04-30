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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class NewsController extends Controller
{
    /**
     * @Route ("/news/new",name="new")
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $form = $this->createFormBuilder($news)
            ->add('title', TextType::class)
            ->add('date', DateType::class)
            ->add('create', SubmitType::class, ['label' => 'Create News'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
             $news = $form->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($news);
             $em->flush();
             echo "<script>alert('Successfully created!')</script>";
            return $this->forward($this->routeToControllerName('news'));
        }
        return $this->render('news/new.html.twig', ['form' => $form->createView(),'title'=>"New News"]);
    }


    /**
     * @Route ("/news",name = "news")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();
        return $this->render('news/index.html.twig',['news'=>$news, 'title'=>"Новости"]);
    }
    private function routeToControllerName($routename) {
        $routes = $this->get('router')->getRouteCollection();
        return $routes->get($routename)->getDefaults()['_controller'];
    }


}