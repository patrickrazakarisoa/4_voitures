<?php

namespace App\Controller;

use App\Entity\Modele;
use App\Entity\RechercheVoiture;
use App\Entity\Voiture;
use App\Form\RechercheVoitureType;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(VoitureRepository $voitureRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $rechercheVoiture = new RechercheVoiture();

        $form = $this->createForm(RechercheVoitureType::class, $rechercheVoiture);
        $form->handleRequest($request);

        $voitures = $paginatorInterface->paginate(
            $voitureRepository->findAllWhitPagination($rechercheVoiture), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            12 /*limit per page*/
        );

        return $this->render('voiture/voitures.html.twig', [
            "voitures" => $voitures,
            "form" => $form->createView(),
            "admin" => true
        ]);
    }

     /**
     * @Route("/admin/voiture/creation", name="admin_creation")
     * @Route("/admin/modifier/{id}", name="admin_modifier", methods="GET|POST")
     */
    public function ajoutModifier(Voiture $voiture = null, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        if(!$voiture){
            $voiture = new Voiture();
        }
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid( )){
            $modif = $voiture->getId() !== null;
            $entityManagerInterface->persist($voiture);
            $entityManagerInterface->flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée." : "L'ajout a été effectué");
            return $this->redirectToRoute("admin");
        };


        return $this->render('admin/ModifAjout.html.twig', [
            "voiture" => $voiture,
            "form" => $form->createView(),
            "isModification" =>$voiture->getId() !==null            
        ]);
    }

    /**
     * @Route("/admin/voiture/{id}", name="admin_suppression", methods="delete")
     */
    public function suppression(Voiture $voiture, EntityManagerInterface $entityManagerInterface, Request $request): Response
    {
        if($this->isCsrfTokenValid("SUP" . $voiture->getId(), $request->get('_token'))){
            $entityManagerInterface->remove($voiture);
            $entityManagerInterface->flush();
            $this->addFlash("success", "La suppression a été effectuée.");
            return $this->redirectToRoute("admin");
        }
    }
}
