<?php

namespace BackendUserBundle\Controller;

use AppBundle\Entity\Post;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostController
 * @package BackendUserBundle\Controller
 */
class PostController extends FOSRestController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @View(serializerGroups={"post"})
     */
    public function getPostsAllAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();

        $view = $this->view($users, 200);
        return $this->handleView($view);
    }



}