<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Form\InstrumentFormType;
use App\Repository\InstrumentRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Security;

class InstrumentController extends AbstractController
{
    
    #[Route("/instruments", name:"instruments")]
    public function index(EntityManagerInterface $manager){
        $instrumentRepo = $manager->getRepository(Instrument::class);
        $instruments = $instrumentRepo->findAll();
       return $this->render("instrument/index.html.twig", [
            "instruments" => $instruments
        ]);
        
    }
   
    #[Route("/instruments/details/{id}", name:"details")]
    public function show( $id, InstrumentRepository $instrumentRepo){
        $instrument = $instrumentRepo->find($id);
        if($instrument == null){
            throw $this->createNotFoundException("instrument introuvable!!");
        }
        return $this->render("instrument/details.html.twig", [
            "instrument" => $instrument,
            "offers" => $instrument->getOffers(),
        ]);
    }
    
    


        #[Route('/add-an-offer', name: 'add-an-offer')]
    public function add_an_offer(Request $request, EntityManagerInterface $manager, Security $security): Response
    {   $instrument = new Instrument();
        $form=$this->createForm(InstrumentFormType::class,$instrument);
        $form->handleRequest($request);
         if($form->isSubmitted() and $form->isValid()){
             
             //$user = $security->getUser();
             $instrument->setPostedAt(new \DateTimeImmutable());
             $instrument->setQuality(2);
             //$instrument->setUser($user);
             $manager->persist($instrument);

             $manager->flush();
            return $this->redirectToRoute("instruments");
         }
            return $this->render("pages/addoffer.html.twig", [
            'instrument_form'=>$form->createView()
              ]);
}


}




