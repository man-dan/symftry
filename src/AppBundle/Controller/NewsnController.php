<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.17
 * Time: 17:59
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Newsn;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use GalleryBundle\Entity\Photo;





class NewsnController extends Controller
{

    /**
     * @Route ("/newsg",name = "newsn")
     */
    public function indexAction()
    {
        $news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findByActive(1);
        return $this->render('news/index.html.twig',['news'=>$news, 'title'=>'Новости']);
    }


    /**
     * @Route ("/newsg/show/newsn{id}",name="curr")
     */
    public function read_newsAction($id, Request $request)
    {

        $news = $this->getDoctrine()->getRepository('AppBundle:Newsn')->findBy(['id'=>$id]);
        $gallery = $this->getDoctrine()->getRepository('GalleryBundle:Gallery')
            ->findBy(['fnews'=>$id,'active'=>1]);
        $photos = $this->getDoctrine()->getRepository('GalleryBundle:Photo')
            ->findBy(['photos'=>$gallery[0]->getId()]);
        return $this->render('news/current.html.twig',
            [   'fnews'=>$gallery,
                'photos'=>$photos,
                'news'=>$news,
                'title'=>'Текущая новость']);

    }

}