<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 30.05.17
 * Time: 11:36
 */

namespace GalleryBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iphpsandbox\PhotoBundle\Entity\Photo;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Newsn;


class GalleryController extends Controller
{
    /**
     * @Route ("/ngallery/g{title}",name="curgallery")
     */
    public function read_galleryAction($title, Request $request)
    {
        $gallery = $this->getDoctrine()->getRepository('GalleryBundle:Gallery')->findBy(['title'=>$title]);
        $photos = $this->getDoctrine()->getRepository('GalleryBundle:Photo')
            ->findBy(['gallery'=>$gallery[0]->getId()]);
        return $this->render('GalleryBundle:Gallery:current.html.twig',
            ['gallery'=>$gallery,'photos'=>$photos,'title'=>'Фотогалерея-'.$title]);

    }
}