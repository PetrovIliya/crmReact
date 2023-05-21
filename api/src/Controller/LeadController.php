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

    #[Route('/api/lead/create', name: 'lead_create', methods: ['POST'])]
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

        $this->getLeadRepository()->store($this->getLeadFromRequest($request));

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

    private function getLeadFromRequest(Request $request): ?Lead
    {
        $params = $request->toArray();

        return new Lead(
            $params['lead_id'] ?? null,
            $params['first_name'] ?? null,
            $params['last_name'] ?? null,
            $params['company_name'] ?? null,
            $params['email'] ?? null,
            $params['status'] ?? null,
            $params['product'] ?? null,
            $params['source_description'] ?? null,
            $params['department'] ?? null,
            $params['job_title'] ?? null,
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

    /**
     * @param Lead[] $leads
     * @return array<int, array<string, string>>
     */
    private function leadsToArray(array $leads): array
    {
        return array_map(static function(Lead $lead) {
            return [
                'lead_id' => $lead->getLeadId(),
                'first_name' => $lead->getFirstName(),
                'last_name' => $lead->getLastName(),
                'company_name' => $lead->getCompanyName(),
                'email' => $lead->getEmail(),
                'status' => $lead->getStatus(),
                'product' => $lead->getProduct(),
                'source_description' => $lead->getSourceDescription(),
                'department' => $lead->getDepartment(),
                'job_title' => $lead->getJobTitle(),
                'phone' => $lead->getPhone(),
                'fax' => $lead->getFax(),
                'address' => $lead->getAddress(),
                'city' => $lead->getCity(),
                'state' => $lead->getState(),
                'post_code' => $lead->getPostcode(),
                'country' => $lead->getCountry(),
                'is_deleted' => $lead->isDeleted(),
                'source' => $lead->getSource()
            ];
        }, $leads);
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