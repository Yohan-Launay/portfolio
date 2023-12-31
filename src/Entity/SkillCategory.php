<?php

namespace App\Entity;

use App\Repository\SkillCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillCategoryRepository::class)]
class SkillCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imgPath = null;

    #[ORM\Column(length: 255)]
    private ?string $imgName = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'skillCategories')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'skillCategory', targetEntity: Skill::class)]
    private Collection $Skills;

    public function __construct()
    {
        $this->Skills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgPath(): ?string
    {
        return $this->imgPath;
    }

    public function setImgPath(string $imgPath): static
    {
        $this->imgPath = $imgPath;

        return $this;
    }

    public function getImgName(): ?string
    {
        return $this->imgName;
    }

    public function setImgName(string $imgName): static
    {
        $this->imgName = $imgName;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->Skills;
    }

    public function addSkill(Skill $skill): static
    {
        if (!$this->Skills->contains($skill)) {
            $this->Skills->add($skill);
            $skill->setSkillCategory($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): static
    {
        if ($this->Skills->removeElement($skill)) {
            // set the owning side to null (unless already changed)
            if ($skill->getSkillCategory() === $this) {
                $skill->setSkillCategory(null);
            }
        }

        return $this;
    }
}
