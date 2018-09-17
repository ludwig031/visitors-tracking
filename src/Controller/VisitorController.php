<?php
  namespace App\Controller;

  use App\Entity\Data;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;

  class VisitorController extends Controller {
    /**
     * @Route("/")
     * @Method({"GET"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
      $ip = $request->getClientIp();

      $time = new \DateTime();
      dump($request->server);
      $host = $request->server->get('HTTP_HOST');
      $userAgent = $request->server->get('HTTP_USER_AGENT');
      $entityManager = $this->getDoctrine()->getManager();

      $data = new Data();
      $data->setIp($ip);
      $data->setTime($time);
      $data->setHost($host);
      $data->setUserAgent($userAgent);

      $entityManager->persist($data);
      $entityManager->flush();

      return $this->render('base.html.twig');
    }

    /**
     * @Route("/admin")
     * @param Request $request
     */
    public function admin(Request $request) {

    }
  }