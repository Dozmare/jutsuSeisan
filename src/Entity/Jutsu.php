<?php

namespace App\Entity;

use App\Repository\JutsuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JutsuRepository::class)
 */
class Jutsu
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
     * @ORM\Column(type="string", length=255)
     */
    private $nameInPlugin;

    /**
     * @ORM\Column(type="integer")
     */
    private $manaCost;

    /**
     * @ORM\Column(type="boolean")
     */
    private $needMastery;

    /**
     * @ORM\Column(type="boolean")
     */
    private $needTarget;

    /**
     * @ORM\Column(type="boolean")
     */
    private $skillVisibility;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canBeFullMaster;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publique;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $itemType;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $level;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="text")
     */
    private $infoSup;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mudras;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lore;

    /**
     * @ORM\ManyToOne(targetEntity=voie::class, inversedBy="jutsus")
     */
    private $idVoie;

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

    public function getNameInPlugin(): ?string
    {
        return $this->nameInPlugin;
    }

    public function setNameInPlugin(string $nameInPlugin): self
    {
        $this->nameInPlugin = $nameInPlugin;

        return $this;
    }

    public function getManaCost(): ?int
    {
        return $this->manaCost;
    }

    public function setManaCost(int $manaCost): self
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    public function isNeedMastery(): ?bool
    {
        return $this->needMastery;
    }

    public function setNeedMastery(bool $needMastery): self
    {
        $this->needMastery = $needMastery;

        return $this;
    }

    public function isNeedTarget(): ?bool
    {
        return $this->needTarget;
    }

    public function setNeedTarget(bool $needTarget): self
    {
        $this->needTarget = $needTarget;

        return $this;
    }

    public function isSkillVisibility(): ?bool
    {
        return $this->skillVisibility;
    }

    public function setSkillVisibility(bool $skillVisibility): self
    {
        $this->skillVisibility = $skillVisibility;

        return $this;
    }

    public function isCanBeFullMaster(): ?bool
    {
        return $this->canBeFullMaster;
    }

    public function setCanBeFullMaster(bool $canBeFullMaster): self
    {
        $this->canBeFullMaster = $canBeFullMaster;

        return $this;
    }

    public function isPublique(): ?bool
    {
        return $this->publique;
    }

    public function setPublique(bool $publique): self
    {
        $this->publique = $publique;

        return $this;
    }

    public function getItemType(): ?string
    {
        return $this->itemType;
    }

    public function setItemType(string $itemType): self
    {
        $this->itemType = $itemType;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getInfoSup(): ?string
    {
        return $this->infoSup;
    }

    public function setInfoSup(string $infoSup): self
    {
        $this->infoSup = $infoSup;

        return $this;
    }

    public function getMudras(): ?string
    {
        return $this->mudras;
    }

    public function setMudras(string $mudras): self
    {
        $this->mudras = $mudras;

        return $this;
    }

    public function getLore(): ?string
    {
        return $this->lore;
    }

    public function setLore(string $lore): self
    {
        $this->lore = $lore;

        return $this;
    }

    public function getIdVoie(): ?voie
    {
        return $this->idVoie;
    }

    public function setIdVoie(?voie $idVoie): self
    {
        $this->idVoie = $idVoie;

        return $this;
    }
}
