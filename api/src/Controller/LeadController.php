<?php

namespace App\Controller;

use App\Entity\Lead;
use App\Repository\LeadRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LeadController extends AbstractFOSRestController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {}

    #[Route('/lead/create', name: 'lead_create', methods: ['POST'])]
    public function createLead(Request $request): JsonResponse
    {
        if ($this->getLeadIdFromRequest($request))
        {
            return new JsonResponse([
                'errors' => 'Unexpected parameter lead_id'
            ], 400);
        }

        $this->getLeadRepository()->store($this->getLeadFromRequest($request));

        return new JsonResponse([
            'OK'
        ]);
    }

    #[Route('/lead/update', name: 'lead_update', methods: ['POST'])]
    public function updateLead(Request $request): JsonResponse
    {
        if (!$this->getLeadIdFromRequest($request))
        {
            return new JsonResponse([
                'errors' => [
                    'lead_id required'
                ]
            ], 400);
        }

        $this->getLeadRepository()->store($this->getLeadFromRequest($request));

        return new JsonResponse([
            'OK'
        ]);
    }

    #[Route('/lead/delete', name: 'lead_delete', methods: ['POST'])]
    public function deleteLead(Request $request): JsonResponse
    {
        if (!$leadId = $this->getLeadIdFromRequest($request))
        {
            return new JsonResponse([
                'errors' => [
                    'lead_id required'
                ]
            ], 400);
        }

        $this->getLeadRepository()->delete($leadId);

        return new JsonResponse([
            'OK'
        ]);
    }

    private function getLeadFromRequest(Request $request): ?Lead
    {
        $params = $request->toArray();

        return new Lead(
            $params['lead_id'] ?? null,
            $params['first_name'] ?? null,
            $params['last_name'] ?? null,
            $params[''] ?? null,
            $params['email'] ?? null,
            $params['status'] ?? null,
            $params['product'] ?? null,
            $params['source_description'] ?? null,
            $params['department'] ?? null,
            $params[''] ?? null,
            $params['phone'] ?? null,
            $params['fax'] ?? null,
            $params['address'] ?? null,
            $params['city'] ?? null,
            $params['state'] ?? null,
            $params['post_code'] ?? null,
            $params['country'] ?? null,
            isset($params['is_deleted']) && (bool)$params['is_deleted'],
            null,
            $params['source'] ?? null,
        );
    }

    private function getLeadRepository(): LeadRepository
    {
        /** @var LeadRepository $repository */
        $repository = $this->entityManager->getRepository(Lead::class);
        return $repository;
    }

    private function getLeadIdFromRequest(Request $request): ?int
    {
        return $request->toArray()['lead_id'] ?? null;

    }
}