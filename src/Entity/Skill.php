<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'Skills')]
    private ?SkillCategory $skillCategory = null;

    #[ORM\OneToMany(mappedBy: 'skill', targetEntity: SkillProject::class)]
    private Collection $skillProjects;

    public function __construct()
    {
        $this->skillProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSkillCategory(): ?SkillCategory
    {
        return $this->skillCategory;
    }

    public function setSkillCategory(?SkillCategory $skillCategory): static
    {
        $this->skillCategory = $skillCategory;

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
            $skillProject->setSkill($this);
        }

        return $this;
    }

    public function removeSkillProject(SkillProject $skillProject): static
    {
        if ($this->skillProjects->removeElement($skillProject)) {
            // set the owning side to null (unless already changed)
            if ($skillProject->getSkill() === $this) {
                $skillProject->setSkill(null);
            }
        }

        return $this;
    }
}
