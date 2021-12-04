<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuteurRepository::class)
 */
class Auteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom_au;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Biographie_au;

    /**
     * @ORM\ManyToMany(targetEntity=Livre::class, mappedBy="Auteur")
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

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenomAu(): ?string
    {
        return $this->Prenom_au;
    }

    public function setPrenomAu(string $Prenom_au): self
    {
        $this->Prenom_au = $Prenom_au;

        return $this;
    }

    public function getBiographieAu(): ?string
    {
        return $this->Biographie_au;
    }

    public function setBiographieAu(string $Biographie_au): self
    {
        $this->Biographie_au = $Biographie_au;

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
            $livre->addAuteur($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            $livre->removeAuteur($this);
        }

        return $this;
    }
    public function __toString()
    {
     return $this->Prenom_au." ".$this->Nom ;
    }
    
}
