<?php
// src/Iphpsandbox/PhotoBundle/Controller/PhotoController.php
namespace Iphpsandbox\PhotoBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iphpsandbox\PhotoBundle\Entity\Photo;
use Symfony\Component\HttpFoundation\Request;



class PhotoController extends Controller
{
    /**
     * @Route("/photo/",name = "photo")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $photo = new Photo();
        $uploadForm = $this->createFormBuilder($photo)
            ->add('title')
            ->add('topic')
            ->add('date','datetime',['data'=> new \DateTime()])

            //Using standart field type
            ->add ('photo','file')
            ->getForm();


        if ($request->isMethod('POST')) {
            $uploadForm->bind($request);

            if ($uploadForm->isValid()) {
                $em->persist($photo);
                $em->flush();
                return $this->redirect($this->generateUrl('photo'));
            }
        }
        $rec = $em->getRepository ('IphpsandboxPhotoBundle:Photo')->findByActive(1);

        return $this->render('IphpsandboxPhotoBundle:Photo:index.html.twig', array(
            'uploadForm' => $uploadForm->createView(),
            'photos' => $this->groupByTopic( $rec),
            'title' => 'Фотографии'
        ));
    }

     /**
     * @Route ("/photo/g{topic}",name="gallery")
     */
    public function read_galleryAction($topic, Request $request)
    {
        $photos = $this->getDoctrine()->getRepository('IphpsandboxPhotoBundle:Photo')->findBy(['topic'=>$topic]);
        return $this->render('IphpsandboxPhotoBundle:Photo:current.html.twig',['photos'=>$photos,'title'=>'Фотогалерея-'.$topic]);

    }

    public function groupByTopic($arr)
    {
        $groupedArr = [];
        foreach ($arr as $data)
        {
            $groupedArr[$data->getTopic()][] = $data;
        }
        return $groupedArr;


    }
}