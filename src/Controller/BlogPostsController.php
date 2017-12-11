<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogPostsController extends Controller
{
    /**
     * @Route("/blog/posts", name="blog_posts")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('/base.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
}
