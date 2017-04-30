<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28.04.17
 * Time: 21:22
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    /**
     * @Route ("/show/{name}")
     */
    public function showAction($name="Stranger")
    {

        return new Response('Hello!'.$name);
    }
}