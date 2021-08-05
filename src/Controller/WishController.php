<?php
namespace App\Controller;

use App\Entity\Wish;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function ajouter(EntityManagerInterface $em):Response {
        $wish = new Wish();
        $wish2 = new Wish();
        $wish3 = new Wish();

        $wish->setAuthor("Leo Morin");
        $wish->setTitle("Devenir riche");
        $wish->setIsPublished(true);
        $wish->setDateCreated(new \DateTime());

        $wish2->setAuthor("Tony Stark");
        $wish2->setTitle("Sauver le monde");
        $wish2->setIsPublished(true);
        $wish2->setDateCreated(new \DateTime('1995/07/27'));

        $wish3->setAuthor("Maximus Decimus Meridius");
        $wish3->setTitle("Se venger, dans cette vie ou dans l'autre");
        $wish3->setIsPublished(true);
        $wish3->setDateCreated(new \DateTime('0005/01/31'));

        $em->persist($wish);
        $em->flush();

        $em->persist($wish2);
        $em->flush();

        $em->persist($wish3);
        $em->flush();

        return $this->redirectToRoute('home');
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
