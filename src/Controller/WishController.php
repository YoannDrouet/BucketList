<?php
namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @Route ("/wish")
 */
class WishController extends AbstractController
{
    /**
     * @Route ("/add", name="addWish")
     */
    public function ajouter(EntityManagerInterface $em, Request $request):Response {
        $wish = new Wish();
        $formWish = $this->createForm(WishType::class, $wish);

        $formWish->handleRequest($request);

        if ($formWish->isSubmitted() && $formWish->isValid()){

            $wish->setIsPublished(true);
            $em->persist($wish);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('main/addIdea.html.twig', ['wish'=>$wish, "formWish"=>$formWish->createView()]);
    }

    /**
     * @Route("/remove/{id}", name="removeWish" )
     */
    public function enlever(Wish $wish,EntityManagerInterface $em):Response
    {
        // pas de beoin de persister
        $em->remove($wish);
        $em->flush();
        return $this->redirectToRoute('home');
    }
}
