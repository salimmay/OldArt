<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Form\InstrumentFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }
    #[Route('/about-us', name: 'about-us')]
    public function about_us(): Response
    {
        return $this->render('pages/aboutus.html.twig');
    }
   /* #[Route('/add-an-offer', name: 'add-an-offer')]
    public function add_an_offer(): Response
    {   $instrument = new Instrument();
        $form=$this->createForm(InstrumentFormType::class,$instrument);
        $form->handleRequest($request);
        // if($form->isSubmitted() and $form->isValid()){
             //$question->setEtat(1);
             $instrument->setPostedAt(new \DateTimeImmutable());
             $instrument->setQuality(2);
             $manager->persist($instrument);
             //$manager->flush();
             //$this->addFlash("messages", "Question publiée!");
             dd($instrument);}
        /*return $this->render('pages/addoffer.html.twig',[
            'instrument_form'=>$form->createView()
        ]);*/
    }
    

