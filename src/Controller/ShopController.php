<?php

namespace App\Controller;

use App\Entity\Vin;
use App\Service\CartShopService;
use App\Repository\VinRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/shop', name: 'shop_')]
class ShopController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET', 'POST'])]
    public function index(VinRepository $vinRepository, Request $request): Response
    {
        $articles = $vinRepository->findAll();

        return $this->render('shop/index.html.twig', ['articles' => $articles]);
    }

    #[Route('/add/{id}/{quantity}', name: 'add', methods: ['GET', 'POST'])]
    public function add(int $id, int $quantity, Request $request, CartShopService $cartShopService): Response
    {
        $cartShopService->addToCart($id, $quantity);

        return $this->redirectToRoute('shop_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{slug}/watchlist', name: 'watchlist', methods: ['GET', 'POST'])]
    public function addToWatchlist(Vin $vin, UserRepository $userRepository): Response
    {

        /** @var \App\Entity\User */
        $user = $this->getUser();
        if ($user->isInWatchlist($vin)) {
            $user->removeWatchlist($vin);
        } else {
            $user->addWatchlist($vin);
        }
        $userRepository->save($user, true);

        return new JsonResponse([
            'isInWatchlist' => $this->getUser()->isInWatchlist($vin)
        ]);
    }
}
