<?php

namespace App\Repository;

use App\Entity\Lead;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

/** @method Lead find($id, $lockMode = null, $lockVersion = null) */
class LeadRepository extends EntityRepository
{
    public function store(Lead $lead): void
    {
        $rsm = new ResultSetMapping();
        $query = $this->getEntityManager()->createNativeQuery(<<<SQL
        INSERT INTO `lead`
        SET
            lead_id = :lead_id,
            first_name = :first_name,
            last_name = :last_name,
            company_name = :company_name,
            email = :email,
            status = :status,
            product = :product,
            source_description = :source_description,
            department = :department,
            job_title = :job_title,
            phone = :phone,
            fax = :fax,
            address = :address,
            city = :city,
            state = :state,
            postcode = :postcode,
            country = :country,
            is_deleted = :is_deleted,
            source = :source        
        ON DUPLICATE KEY UPDATE 
            first_name = :first_name,
            last_name = :last_name,
            company_name = :company_name,
            email = :email,
            status = :status,
            product = :product,
            source_description = :source_description,
            department = :department,
            job_title = :job_title,
            phone = :phone,
            fax = :fax,
            address = :address,
            city = :city,
            state = :state,
            postcode = :postcode,
            country = :country,
            is_deleted = :is_deleted,
            source = :source
        SQL, $rsm);

        $query->execute([
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
            'postcode' => $lead->getPostCode(),
            'country' => $lead->getCountry(),
            'is_deleted' => $lead->isDeleted(),
            'source' => $lead->getSource()
        ]);
    }

    public function delete(int $leadId): void
    {
        $rsm = new ResultSetMapping();
        $query = $this->getEntityManager()->createNativeQuery(<<<SQL
        DELETE FROM `lead`
        WHERE lead_id = :lead_id
        SQL, $rsm);

        $query->execute(['lead_id' => $leadId]);
    }
}