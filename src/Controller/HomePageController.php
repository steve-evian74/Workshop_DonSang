<?php
namespace App\Controller;

use Laminas\Code\Generator\DocBlock\Tag\ReturnTag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    /**
     * @Route("/HomePage")
     */
class HomePageController extends AbstractController
{
/**
     * @Route("/", name="homePage", methods={"GET"})
     */
    public function Index()
    {
        return $this->render('HomePage/index.html.twig');

    }
}

?>