<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

#[ApiResource]
class JobRole
{
    private ?int $id = null;

    /** @var Department[] */
    public ?iterable $department = null;

    public function __construct()
    {
        $this->department = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}