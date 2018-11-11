<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyController extends AbstractController
{

/**
 * @var PropertyRepository
 */
private $repo;

/**
 * @var ObjectManager
 */
private $em;

public function __construct(PropertyRepository $repo, ObjectManager $em)
{
$this->repository = $repo;
$this->em = $em;
}

/**
 * @Route("/biens", name="property.index") 
 */
public function index()
{
    $property = $this->repository
    ->findAll();
    $property[count($property)-1]->setSold(false);
    $this->em->flush(); 


    dump($property);

return $this->render('property/index.html.twig', ['current_menu' => 'properties']);


}

/**
 * @Route("/product/{id}", name="product_show")
 */
public function show($id)
{
$product = $this->getDoctrine()
    ->getRepository(Property::class)
    ->find($id);
    dump($product);

if (!$product) {
    throw $this->createNotFoundException(
        'No product found for id '.$id
    );
}

return new Response('Check out this great product: '.$product->getName());



// or render a template
// in the template, print things with {{ product.name }}
// return $this->render('product/show.html.twig', ['product' => $product]);
}
}
