<?php
  namespace App\Controller;


  use App\Entity\Data;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\Routing\Annotation\Route;

  class AdminController extends Controller {
    /**
     * @Route("/admin")
     * @Method({"GET"})
     */
    public function index() {
      $data = $this->getDoctrine()->getRepository(Data::class)->findAll();

      return $this->render('admin/index.html.twig', array ('data' => $data));
    }

    /**
     * @Route("/admin/{token}")
     * @Method({"GET"})
     */
    public function show($token) {
      $data = $this->getDoctrine()->getRepository(Data::class)->findBy(array('token' => $token));

      return $this->render('admin/show.html.twig', array ('data' => $data));
    }
  }