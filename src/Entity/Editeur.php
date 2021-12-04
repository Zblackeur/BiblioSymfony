<?php

namespace App\Entity;

use App\Repository\EditeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditeurRepository::class)
 */
class Editeur
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
    private $Nom_Ed;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Pays_ed;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Adresse_ed;

    /**
     * @ORM\Column(type="integer")
     */
    private $Telephone_ed;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="editeur_Li")
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

    public function getNomEd(): ?string
    {
        return $this->Nom_Ed;
    }

    public function setNomEd(string $Nom_Ed): self
    {
        $this->Nom_Ed = $Nom_Ed;

        return $this;
    }

    public function getPaysEd(): ?string
    {
        return $this->Pays_ed;
    }

    public function setPaysEd(string $Pays_ed): self
    {
        $this->Pays_ed = $Pays_ed;

        return $this;
    }

    public function getAdresseEd(): ?string
    {
        return $this->Adresse_ed;
    }

    public function setAdresseEd(string $Adresse_ed): self
    {
        $this->Adresse_ed = $Adresse_ed;

        return $this;
    }

    public function getTelephoneEd(): ?int
    {
        return $this->Telephone_ed;
    }

    public function setTelephoneEd(int $Telephone_ed): self
    {
        $this->Telephone_ed = $Telephone_ed;

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
            $livre->setEditeurLi($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getEditeurLi() === $this) {
                $livre->setEditeurLi(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
     return $this->Nom_Ed;
    
    }
    
}
