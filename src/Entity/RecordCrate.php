<?php

namespace App\Entity;

use App\Repository\RecordCrateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecordCrateRepository::class)]
class RecordCrate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $crateId = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, Vinyl>
     */
    #[ORM\OneToMany(targetEntity: Vinyl::class, mappedBy: 'recordCrate')]
    private Collection $vinyls;

    public function __construct()
    {
        $this->vinyls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrateId(): ?int
    {
        return $this->crateId;
    }

    public function setCrateId(int $crateId): static
    {
        $this->crateId = $crateId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Vinyl>
     */
    public function getVinyls(): Collection
    {
        return $this->vinyls;
    }

    public function addVinyl(Vinyl $vinyl): static
    {
        if (!$this->vinyls->contains($vinyl)) {
            $this->vinyls->add($vinyl);
            $vinyl->setRecordCrate($this);
        }

        return $this;
    }

    public function removeVinyl(Vinyl $vinyl): static
    {
        if ($this->vinyls->removeElement($vinyl)) {
            // set the owning side to null (unless already changed)
            if ($vinyl->getRecordCrate() === $this) {
                $vinyl->setRecordCrate(null);
            }
        }

        return $this;
    }
}
