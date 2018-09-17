<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\Routing\Annotation\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

  class VisitorController {
    /**
     * @Route("/")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
      $ip = $request->getClientIp();
      return new Response($ip);
    }
  }