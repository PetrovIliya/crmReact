<?php
declare(strict_types=1);

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController extends AbstractFOSRestController
{
    #[Route('/api/healthCheck', name: 'healthCheck', methods: ['GET'])]
    public function getHealthCheck(): JsonResponse
    {
        return new JsonResponse([
            'status' => "I'm alive",
            'code' => 'ok'
        ]);
    }
}