<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $resume = null;

    #[ORM\Column]
    private ?int $state = null;

    #[ORM\Column(length: 255)]
    private ?string $urlPath = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: SkillProject::class)]
    private Collection $skillProjects;

    public function __construct()
    {
        $this->skillProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): static
    {
        $this->resume = $resume;

        return $this;
    }

    public function getState(): ?int
    {
        return $this->state;
    }

    public function setState(int $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getUrlPath(): ?string
    {
        return $this->urlPath;
    }

    public function setUrlPath(string $urlPath): static
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    /**
     * @return Collection<int, SkillProject>
     */
    public function getSkillProjects(): Collection
    {
        return $this->skillProjects;
    }

    public function addSkillProject(SkillProject $skillProject): static
    {
        if (!$this->skillProjects->contains($skillProject)) {
            $this->skillProjects->add($skillProject);
            $skillProject->setProject($this);
        }

        return $this;
    }

    public function removeSkillProject(SkillProject $skillProject): static
    {
        if ($this->skillProjects->removeElement($skillProject)) {
            // set the owning side to null (unless already changed)
            if ($skillProject->getProject() === $this) {
                $skillProject->setProject(null);
            }
        }

        return $this;
    }
}
