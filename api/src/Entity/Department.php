<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class Department
{
    private ?int $id = null;

    public string $title = '';

    /** @var JobRole[] */
    public ?iterable $jobRoles = null;

    public function __construct()
    {
        $this->jobRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}