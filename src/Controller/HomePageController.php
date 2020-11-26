<?php
namespace App\Controller;

use Laminas\Code\Generator\DocBlock\Tag\ReturnTag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomePageController extends AbstractController
{
    /**
     * @Route("/HomePage/number")
     */
    public function HomePage()
    {
        $number = random_int(0,100);

        return $this->render('HomePage/number.html.twig',['number' => $number,]);
    
        
    }
}

?>