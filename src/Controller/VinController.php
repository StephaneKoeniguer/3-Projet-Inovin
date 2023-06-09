<?php

namespace App\Controller;

use App\Entity\Vin;
use App\Form\VinType;
use App\Repository\VinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vin')]
class VinController extends AbstractController
{
    #[Route('/', name: 'app_vin_index', methods: ['GET'])]
    public function index(VinRepository $vinRepository): Response
    {

        return $this->render('vin/index.html.twig', [
            'vins' => $vinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VinRepository $vinRepository): Response
    {
        $vin = new Vin();
        $form = $this->createForm(VinType::class, $vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vinRepository->save($vin, true);

            return $this->redirectToRoute('app_vin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vin/new.html.twig', [
            'vin' => $vin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vin_show', methods: ['GET'])]
    public function show(Vin $vin): Response
    {
        return $this->render('vin/show.html.twig', [
            'vin' => $vin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vin $vin, VinRepository $vinRepository): Response
    {
        $form = $this->createForm(VinType::class, $vin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vinRepository->save($vin, true);

            return $this->redirectToRoute('app_vin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vin/edit.html.twig', [
            'vin' => $vin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vin_delete', methods: ['POST'])]
    public function delete(Request $request, Vin $vin, VinRepository $vinRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $vin->getId(), $request->request->get('_token'))) {
            $vinRepository->remove($vin, true);
        }

        return $this->redirectToRoute('app_vin_index', [], Response::HTTP_SEE_OTHER);
    }
}
