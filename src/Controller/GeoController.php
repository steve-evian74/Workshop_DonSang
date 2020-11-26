<?php

namespace App\Controller;

use App\Entity\Geo;
use App\Form\GeoType;
use App\Repository\GeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/geo")
 */
class GeoController extends AbstractController
{
    /**
     * @Route("/", name="geo_index", methods={"GET"})
     */
    public function index(GeoRepository $geoRepository): Response
    {
        return $this->render('geo/index.html.twig', [
            'geos' => $geoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="geo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $geo = new Geo();
        $form = $this->createForm(GeoType::class, $geo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($geo);
            $entityManager->flush();

            return $this->redirectToRoute('geo_index');
        }

        return $this->render('geo/new.html.twig', [
            'geo' => $geo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="geo_show", methods={"GET"})
     */
    public function show(Geo $geo): Response
    {
        return $this->render('geo/show.html.twig', [
            'geo' => $geo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="geo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Geo $geo): Response
    {
        $form = $this->createForm(GeoType::class, $geo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('geo_index');
        }

        return $this->render('geo/edit.html.twig', [
            'geo' => $geo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="geo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Geo $geo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$geo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($geo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('geo_index');
    }
}
