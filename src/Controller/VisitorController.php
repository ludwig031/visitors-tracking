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
      $host = $request->server->get('HTTP_HOST');
      $userAgent = $request->server->get('HTTP_USER_AGENT');
      $token = $this->Token();
      $entityManager = $this->getDoctrine()->getManager();

      $data = new Data();
      $data->setIp($ip);
      $data->setTime($time);
      $data->setHost($host);
      $data->setUserAgent($userAgent);
      $data->setToken($token);

      $entityManager->persist($data);
      $entityManager->flush();

      return $this->render('base.html.twig');
    }

    public function Token(){
      if(!isset($_COOKIE['token'])) {
        $randomString = $this->RandomString();
        setcookie('token', $randomString);
        return $randomString;
      } else {
        return $_COOKIE['token'];
      }
    }

    public function RandomString()
    {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
  }