<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Repository\ContratRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/contrat')]

class ContratController extends AbstractController
{
    #[Route(name: 'api_contrat_index', methods: ["GET"])]
    public function getAll(ContratRepository $contratRepository, SerializerInterface $serializer): JsonResponse
    {
        $contratList = $contratRepository->findAll();

        $contratJson = $serializer->serialize($contratList, 'json', ['groups' => "contrat"]);


        return new JsonResponse($contratJson, JsonResponse::HTTP_OK, [], true);
    }

    #[Route(path: "/{id}", name: 'api_contrat_show', methods: ["GET"])]
    public function get(Contrat $contrat, SerializerInterface $serializer): JsonResponse
    {

        $contratJson = $serializer->serialize($contrat, 'json', ['groups' => "contrat"]);

        return new JsonResponse($contratJson, JsonResponse::HTTP_OK, [], true);
    }
}
