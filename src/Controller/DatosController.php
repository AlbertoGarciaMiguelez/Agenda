<?php

namespace App\Controller;

use App\Entity\Contacto;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DatosController extends AbstractController
{
    #[Route('/datos', name: 'datos')]
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository(Contacto::class)->findAll();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('datos/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
    #[Route('/datospf', name: 'datos2')]
    public function index2(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository(Contacto::class)->FiltroProfesional();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('datos/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
    #[Route('/datospr', name: 'datos3')]
    public function index3(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository(Contacto::class)->FiltroPersonal();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('datos/index.html.twig', [
            'pagination' => $pagination
        ]);
    }

    #[Route('/datos/{id}', name: 'verdatos')]
    public function VerContacto(PaginatorInterface $paginator, Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $datos=$em->getRepository(Contacto::class)->Dato($id);
        $pagination = $paginator->paginate(
            $datos, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );

        return $this->render('datos/ver.html.twig', [
            'pagination' => $pagination
            ]);
    }
    
    #[Route('/datos/{id}/delete', name: 'delete')]
    public function delete(Contacto $diary, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($diary);
        $em->flush();

        return $this->render('datos/borrado.html.twig', [
            'controller_name' => 'PortadaController',
        ]);
    }
}
