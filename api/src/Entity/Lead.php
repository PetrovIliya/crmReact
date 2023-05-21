<?php

namespace App\Entity;

use App\Repository\LeadRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: LeadRepository::class)]
#[Table(name: 'lead')]
class Lead
{
    #[Id]
    #[Column(type: Types::INTEGER, nullable: false)]
    #[GeneratedValue]
    private ?int $leadId;
    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $firstName;
    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $lastName;
    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $companyName;
    #[Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $email;
    #[Column(type: Types::STRING, length: 20, nullable: true)]
    private string $status;
    #[Column(type: Types::STRING, length: 30, nullable: true)]
    private string $product;
    #[Column(type: Types::STRING, length: 1000, nullable: true)]
    private ?string $sourceDescription;
    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $department;
    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $jobTitle;
    #[Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $phone;
    #[Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $fax;
    #[Column(type: Types::STRING, length: 512, nullable: true)]
    private ?string $address;
    #[Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $city;
    #[Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $state;
    #[Column(type: Types::STRING, length: 50, nullable: true)]
    private ?string $postCode;
    #[Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $country;
    #[Column(type: Types::INTEGER, nullable: false)]
    private bool $isDeleted;
    #[Column(type: Types::DATE_IMMUTABLE, nullable: false)]
    private ?\DateTimeImmutable $createdAt;
    #[Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $source;

    public function __construct(?int $leadId, ?string $firstName, ?string $lastName, ?string $companyName, ?string $email, string $status, string $product, ?string $sourceDescription, ?string $department, ?string $jobTitle, ?string $phone, ?string $fax, ?string $address, ?string $city, ?string $state, ?string $postCode, ?string $country, bool $isDeleted, ?\DateTimeImmutable $createdAt, ?string $source)
    {
        $this->leadId = $leadId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->companyName = $companyName;
        $this->email = $email;
        $this->status = $status;
        $this->product = $product;
        $this->sourceDescription = $sourceDescription;
        $this->department = $department;
        $this->jobTitle = $jobTitle;
        $this->phone = $phone;
        $this->fax = $fax;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->postCode = $postCode;
        $this->country = $country;
        $this->isDeleted = $isDeleted;
        $this->createdAt = $createdAt;
        $this->source = $source;
    }

    public function getLeadId(): ?int
    {
        return $this->leadId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getProduct(): string
    {
        return $this->product;
    }

    public function getSourceDescription(): ?string
    {
        return $this->sourceDescription;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setLeadId(?int $leadId): void
    {
        $this->leadId = $leadId;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setProduct(string $product): void
    {
        $this->product = $product;
    }

    public function setSourceDescription(?string $sourceDescription): void
    {
        $this->sourceDescription = $sourceDescription;
    }

    public function setDepartment(?string $department): void
    {
        $this->department = $department;
    }

    public function setJobTitle(?string $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function setFax(?string $fax): void
    {
        $this->fax = $fax;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function setPostCode(?string $postCode): void
    {
        $this->postCode = $postCode;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setSource(?string $source): void
    {
        $this->source = $source;
    }
}