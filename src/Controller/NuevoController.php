<?php

namespace App\Controller;

use App\Entity\Contacto;
use App\Form\FormularioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class NuevoController extends AbstractController
{
    #[Route('/nuevo', name: 'nuevo')]
    public function index(Request $request)
    {
        $contacto =new Contacto();
        $form = $this->createForm(FormularioType::class, $contacto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacto);
            $em->flush();
            return $this->redirectToRoute('datos');
        }
        return $this->render('nuevo/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }

    #[Route('/nuevo/{id}/edit', name: 'editar')]
    public function edit(Request $request, Contacto $contacto): Response
    {
        
        $form = $this->createForm(FormularioType::class, $contacto, [
            'action' => $this->generateUrl('editar', ['id' => $contacto->getId()]),
            'method' => 'PUT',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contacto = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacto);
            $em->flush();

            return $this->redirectToRoute('datos');
        }

        return $this->render('nuevo/index.html.twig', [
            'formulario' => $form->createView(),
        ]);
    }
}
