<?php

namespace App\Repository;

use App\Entity\Lead;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

/** @method Lead|null find($id, $lockMode = null, $lockVersion = null) */
class LeadRepository extends EntityRepository
{
    public function create(Lead $lead): int
    {
        $rsm = new ResultSetMapping();
        $query = $this->getEntityManager()->createNativeQuery(<<<SQL
        INSERT INTO `lead`
        SET
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
            is_test = :is_test,
            source = :source
        SQL, $rsm);

        $query->execute($this->getLeadParams($lead));

        return (int) $this->getEntityManager()->getConnection()->lastInsertId();
    }

    public function update(Lead $lead): void
    {
        $rsm = new ResultSetMapping();
        $query = $this->getEntityManager()->createNativeQuery(<<<SQL
        UPDATE `lead`
        SET
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
            is_test = :is_test,
            source = :source
        WHERE lead_id = :lead_id
        SQL, $rsm);

        $query->execute(array_merge(['lead_id' => $lead->getLeadId(), $this->getLeadParams($lead)]));
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


    /**
     * @return Lead[]
     */
    public function fetch(int $limit = null, string $orderDirection = null): array
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('l')
            ->from(Lead::class, 'l');

        if ($limit)
        {
            $qb->setMaxResults($limit);
        }

        if ($orderDirection)
        {
            $qb->orderBy('l.leadId', $orderDirection);
        }

        return $qb->getQuery()->getResult();
    }

    private function getLeadParams(Lead $lead): array
    {
        return [
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
            'postcode' => $lead->getPostcode(),
            'country' => $lead->getCountry(),
            'is_test' => $lead->isTest(),
            'source' => $lead->getSource()
        ];
    }
}