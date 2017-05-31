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
     * @Route ("/ngallery/g{topic}",name="curgallery")
     */
    public function read_galleryAction($topic, Request $request)
    {
        $photos = $this->getDoctrine()->getRepository('GalleryBundle:Gallery')->findBy(['topic'=>$topic]);
        return $this->render('GalleryBundle:Gallery:current.html.twig',['photos'=>$photos,'title'=>'Фотогалерея-'.$topic]);

    }
}