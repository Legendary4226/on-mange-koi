<?php

namespace App\Controller;

use App\Entity\GroceryList;
use App\Entity\Product;
use App\Form\GroceryListType;
use App\Form\ProductType;
use App\Repository\GroceryListRepository;
use App\Repository\ProductRepository;
use App\Trait\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroceryListController extends AbstractController
{
    use ControllerTrait;


    #[Route(path: '/product', name: 'product_list')]
    public function productList(Request $request, ProductRepository $productRepository): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product->setUser($this->getUser());
            $productRepository->saveEntity($product);

            return $this->redirectToRoute('product_list');
        }

        return $this->render('pages/grocery/product_list.html.twig', [
            "products" => $this->getUser()->getProducts(),
            "form" => $form,
        ]);
    }
    
    #[Route(path: '/grocery-list', name: 'grocery_list_list')]
    public function groceryListList(Request $request, GroceryListRepository $groceryListRepository): Response
    {
        $groceryList = new GroceryList();
        $form = $this->createForm(GroceryListType::class, $groceryList);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $groceryList->setOwner($this->getUser());
            $groceryListRepository->saveEntity($groceryList);

            return $this->redirectToRoute('grocery_list_list');
        }

        return $this->render('pages/grocery/grocery_list_list.html.twig', [
            "groceryLists" => $this->getUser()->getGroceryLists(),
            "form" => $form,
        ]);
    }
}