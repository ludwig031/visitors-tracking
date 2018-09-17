<?php
  namespace App\Controller;

  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\HttpFoundation\Response;

  class VisitorController {
    public function index(Request $request) {
      $ip = $request->getClientIp();
      return new Response($ip);
    }
  }