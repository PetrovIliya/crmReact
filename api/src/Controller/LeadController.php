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
    const DEFAULT_LEAD_LIMIT = 100;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {}

    #[Route('/api/lead/create', name: 'lead_create', methods: ['POST', 'OPTION'])]
    public function createLead(Request $request): JsonResponse
    {
        if ($this->getLeadIdFromRequest($request))
        {
            return new JsonResponse([
                'errors' => 'Unexpected parameter lead_id'
            ], 400);
        }

        $leadId = $this->getLeadRepository()->create($this->getLeadFromRequest($request));

        return new JsonResponse([
            'lead_id' => $leadId
        ]);
    }

    #[Route('/api/lead/update', name: 'lead_update', methods: ['POST'])]
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

        $this->getLeadRepository()->update($this->getLeadFromRequest($request));

        return new JsonResponse([
            'OK'
        ]);
    }

    #[Route('/api/lead/delete', name: 'lead_delete', methods: ['POST'])]
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

    #[Route('/api/lead/list', name: 'lead_list', methods: ['GET'])]
    public function getLeads(Request $request): JsonResponse
    {
        $limit = $request->query->get('limit') ?: self::DEFAULT_LEAD_LIMIT;
        $orderDirection = $request->query->get('order_direction') ?: null;

        $leads = $this->getLeadRepository()->fetch($limit, $orderDirection);

        return new JsonResponse($this->leadsToArray($leads));
    }

    #[Route('/api/lead/', name: 'lead_by_id', methods: ['GET'])]
    public function getLeadById(Request $request): JsonResponse
    {
        $leadId = $request->query->get('lead_id');
        if (!$leadId)
        {
            return new JsonResponse([
                'errors' => 'lead_id required'
            ], 400);
        }

        if (!$lead = $this->getLeadRepository()->find($leadId))
        {
            return new JsonResponse([
                'errors' => 'Lead not found'
            ], 422);
        }

        return new JsonResponse($this->leadToArray($lead));
    }

    private function getLeadFromRequest(Request $request): ?Lead
    {
        $params = $request->toArray();

        return new Lead(
            $params['lead_id'] ?? null,
            $params['firstName'] ?? null,
            $params['lastName'] ?? null,
            $params['companyName'] ?? null,
            $params['email'] ?? null,
            'New',
            $params['product'] ?? null,
            $params['sourceDescription'] ?? null,
            $params['department'] ?? null,
            $params['jobTitle'] ?? null,
            $params['phone'] ?? null,
            $params['fax'] ?? null,
            $params['address'] ?? null,
            $params['city'] ?? null,
            $params['state'] ?? null,
            $params['postcode'] ?? null,
            $params['country'] ?? null,
            isset($params['isTest']) && (bool)$params['isTest'],
            null,
            $params['source'] ?? null,
        );
    }

    /**
     * @param Lead[] $leads
     * @return array<int, array<string, string>>
     */
    private function leadsToArray(array $leads): array
    {
        return array_map(function(Lead $lead) {
           return $this->leadToArray($lead);
        }, $leads);
    }

    private function leadToArray(Lead $lead): array
    {
        return [
            'leadId' => $lead->getLeadId(),
            'firstName' => $lead->getFirstName(),
            'lastName' => $lead->getLastName(),
            'companyName' => $lead->getCompanyName(),
            'email' => $lead->getEmail(),
            'status' => $lead->getStatus(),
            'product' => $lead->getProduct(),
            'sourceDescription' => $lead->getSourceDescription(),
            'department' => $lead->getDepartment(),
            'jobTitle' => $lead->getJobTitle(),
            'phone' => $lead->getPhone(),
            'fax' => $lead->getFax(),
            'address' => $lead->getAddress(),
            'city' => $lead->getCity(),
            'state' => $lead->getState(),
            'postcode' => $lead->getPostcode(),
            'country' => $lead->getCountry(),
            'isTest' => $lead->isTest(),
            'source' => $lead->getSource()
        ];
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