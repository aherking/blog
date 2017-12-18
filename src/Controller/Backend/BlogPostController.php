<?php

namespace App\Controller\Backend;


use App\Repository\BlogPostRepository;
use App\Entity\BlogPost;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class BlogPostController extends Controller
{
    /**
     * @Route("/blog/post", name="blog_post")
     */

    public function index()
    {
        return $this->render('admin/index.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

    public function create(Request $request)
    {
      $post = new BlogPost();

      $form  = $this->createFormBuilder($post)
        ->add('name', TextType::class)
        ->add('content', TextType::class)
        ->add('tags', TextType::class)
        ->add('save', SubmitType::class, array ('label' => 'Posten'))
        ->getForm();


      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $user = $this->getUser();
        $userID = $user->getID();
        $post = $post->setUserID($userID);
        $post = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();

        return $this->redirectToRoute('/admin/create');
      }

      return $this->render('admin/create.html.twig', array(
            'form' => $form->createView(),
      ));
    }
}
