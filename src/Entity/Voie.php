<?php

namespace App\Entity;

use App\Repository\VoieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoieRepository::class)
 */
class Voie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Jutsu::class, mappedBy="idVoie")
     */
    private $jutsus;

    public function __construct()
    {
        $this->jutsus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Jutsu>
     */
    public function getJutsus(): Collection
    {
        return $this->jutsus;
    }

    public function addJutsu(Jutsu $jutsu): self
    {
        if (!$this->jutsus->contains($jutsu)) {
            $this->jutsus[] = $jutsu;
            $jutsu->setIdVoie($this);
        }

        return $this;
    }

    public function removeJutsu(Jutsu $jutsu): self
    {
        if ($this->jutsus->removeElement($jutsu)) {
            // set the owning side to null (unless already changed)
            if ($jutsu->getIdVoie() === $this) {
                $jutsu->setIdVoie(null);
            }
        }

        return $this;
    }
}
