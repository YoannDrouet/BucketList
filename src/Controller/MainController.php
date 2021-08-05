<?php
namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    /**
    * @Route("/", name="home")
    */
    public function home(WishRepository $repo) :Response
    {
        return $this->render("main/home.html.twig",["listeWish"=>$repo->findBy([],["dateCreated"=>"DESC"])]);
    }

    /**
    * @Route("/detail/{id}", name="detail")
    */
    public function detail() :Response {
        return $this->render("main/detail.html.twig");
    }

    /**
    * @Route("/aboutUs", name="about")
    */
    public function about() :Response {
        return $this->render("main/about.html.twig");
    }
}