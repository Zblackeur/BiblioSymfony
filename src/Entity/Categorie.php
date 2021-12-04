<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $designation_Ca;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Description_ca;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="categorie")
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignationCa(): ?string
    {
        return $this->designation_Ca;
    }

    public function setDesignationCa(string $designation_Ca): self
    {
        $this->designation_Ca = $designation_Ca;

        return $this;
    }

    public function getDescriptionCa(): ?string
    {
        return $this->Description_ca;
    }

    public function setDescriptionCa(string $Description_ca): self
    {
        $this->Description_ca = $Description_ca;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setCategorie($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getCategorie() === $this) {
                $livre->setCategorie(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
     return $this->designation_Ca;
    }
}
