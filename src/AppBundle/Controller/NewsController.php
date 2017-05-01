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



class NewsController extends Controller
{
    /**
     * @Route ("/news/new",name="new")
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $form = $this->createFormBuilder($news)
            ->add('title','text')
            ->add('date','date')
            ->add('create','submit', ['label' => 'Create News'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
             $news = $form->getData();
             $em = $this->getDoctrine()->getManager();
             $em->persist($news);
             $em->flush();
             return $this->redirect($this->generateUrl('news'));
        }
        return $this->render('news/new.html.twig', ['form' => $form->createView(),'title'=>'New News']);
    }

    /**
     * @Route("/news/edit/{id}",name="edit")
     */

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->find($id);
        $form = $this->createFormBuilder($news)
            ->add('title', 'text')
            ->add('date','date')
            ->add('create','submit', ['label' => 'Update News'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->flush();
            return $this->redirect($this->generateUrl('news'));
        }
        return $this->render('news/new.html.twig', ['form' => $form->createView(),'title'=>'Update News']);
    }


    /**
     * @Route ("/news",name = "news")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('AppBundle:News')->findAll();
        return $this->render('news/index.html.twig',['news'=>$news, 'title'=>'Новости']);
    }

    /**
     * @Route("/news/delnews/{id}",name = "delnews")
     */
    public function delAction($id)
    {   $em = $this->getDoctrine()->getManager();
        $news = $em->getRepository('AppBundle:News')->find($id);
        $em->remove($news);
        $em->flush();
        return $this->redirect($this->generateUrl('news'));
    }


}