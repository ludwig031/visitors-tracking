<?php
  namespace App\Controller;

  use App\Entity\Data;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;

  class VisitorController extends Controller {
    /**
     * @Route("/")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
      $ip = $request->getClientIp();
      $time = new \DateTime();


      $entityManager = $this->getDoctrine()->getManager();
      $data = new Data();
      $data->setIp($ip);
      $data->setTime($time);

      $entityManager->persist($data);
      $entityManager->flush();
      return new Response("We are not monitoring you :)");
    }
  }