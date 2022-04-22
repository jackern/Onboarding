<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartmentRepository::class)]
#[ApiResource]
class Department
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\ManyToMany(targetEntity: JobRole::class, mappedBy: 'department')]
    private $jobRoles;

    public function __construct()
    {
        $this->jobRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|JobRole[]
     */
    public function getJobRoles(): Collection
    {
        return $this->jobRoles;
    }

    public function addJobRole(JobRole $jobRole): self
    {
        if (!$this->jobRoles->contains($jobRole)) {
            $this->jobRoles[] = $jobRole;
            $jobRole->addDepartment($this);
        }

        return $this;
    }

    public function removeJobRole(JobRole $jobRole): self
    {
        if ($this->jobRoles->removeElement($jobRole)) {
            $jobRole->removeDepartment($this);
        }

        return $this;
    }
}
