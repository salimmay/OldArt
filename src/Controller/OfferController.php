<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Entity\Instrument;
use App\Form\OfferFormType;
use App\Repository\InstrumentRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OfferController extends AbstractController
{
    #[Route('/offer/form/{id}', name: 'add_proposal')]
    public function add_proposal($id,Request $request, EntityManagerInterface $manager,Security $security, InstrumentRepository $instrumentRepo): Response
    {    $proposal = new Offer();
        $form=$this->createForm(OfferFormType::class,$proposal);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            //set user
            $user = $security->getUser();
            $proposal->setUser($user);
            
            //set instrument
            $instrument = $instrumentRepo->find($id);
            $proposal->setInstrument($instrument);

            //set date
            $proposal->setCreatedAt(new \DateTimeImmutable());
            
            $manager->persist($proposal);

            $manager->flush();
           return $this->redirectToRoute("instruments");
        }
        return $this->render("offer/addproposal.html.twig", [
            "proposal_form" => $form->createView()
        ]);
    }
    #[Route("/offer/choose_offer/{id}", name:"choose_offer")]
    public function delete($id,EntityManagerInterface $entityManager){
        
        $instrumentRepo = $entityManager->getRepository(Instrument::class);
        $instrument = $instrumentRepo->find($id);
        $this->$entityManager->remove($instrument);
        $this->$entityManager->flush();   
         return $this->render("pages/home.html.twig");
    }
    
}  
