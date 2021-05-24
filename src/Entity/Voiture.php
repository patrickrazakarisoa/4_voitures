<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "le champ ne peut être nul")
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=true,
     *     message="Ce champ doit contenir un nombre entier"
     * )
     * @Assert\Length(
     *      min = 4,
     *      max = 7,
     *      minMessage = "Ce champ doit contenir au minimum {{ limit }} caractères",
     *      maxMessage = "Ce champ doit contenir au maximum {{ limit }} caractères"
     * )
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 2,
     *      max = 5,
     *      notInRangeMessage = "Vous devez choisir entre {{ min }} et {{ max }}.",
     * )   
     * @Assert\NotBlank(message = "le champ ne peut être nul")
     */
    private $nbPortes;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 1990,
     *      max = 2020,
     *      notInRangeMessage = "Vous devez mettre un nombre d'année entre {{ min }} et {{ max }}.",
     * )
     * @Assert\NotBlank(message = "le champ ne peut être nul")
     */
    private $annee;

    /**
     * @ORM\ManyToOne(targetEntity=Modele::class, inversedBy="voitures")
     */
    private $modele;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getNbPortes(): ?int
    {
        return $this->nbPortes;
    }

    public function setNbPortes(int $nbPortes): self
    {
        $this->nbPortes = $nbPortes;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): self
    {
        $this->modele = $modele;

        return $this;
    }
}
