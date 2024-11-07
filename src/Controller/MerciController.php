<?php

namespace App\Controller;

use App\Entity\Merci;
use App\Form\MerciType;
use App\Repository\MerciRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MerciController extends AbstractController
{
    #[Route('/merci', name: 'app_merci_index')]
    public function index(MerciRepository $merciRepository): Response
    {
        $mercis = $merciRepository->findAll();

        return $this->render('merci/index.html.twig', [
            'mercis' => $mercis,
        ]);
    }

    #[Route('/merci/new', name: 'app_merci_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $merci = new Merci();
        $form = $this->createForm(MerciType::class, $merci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($merci);
            $entityManager->flush();

            return $this->redirectToRoute('app_merci_index');
        }

        return $this->render('merci/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/merci/{id}/edit', name: 'app_merci_edit')]
    public function edit(Merci $merci, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($merci->getDe() !== $this->getUser()) {
            $this->addFlash('error', 'Vous ne pouvez pas modifier ce merci.');
            return $this->redirectToRoute('app_merci_index');
        }

        $form = $this->createForm(MerciType::class, $merci);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_merci_index');
        }

        return $this->render('merci/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/merci/{id}/delete', name: 'app_merci_delete')]
    public function delete(Merci $merci, EntityManagerInterface $entityManager): Response
    {
        if ($merci->getDe() !== $this->getUser()) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer ce merci.');
            return $this->redirectToRoute('app_merci_index');
        }

        $entityManager->remove($merci);
        $entityManager->flush();

        $this->addFlash('success', 'Merci supprimé avec succès.');
        return $this->redirectToRoute('app_merci_index');
    }
}
