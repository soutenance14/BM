<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

//POST for collectionsOperations is not a requested functions

/**
 * @ApiResource(
 *      attributes= {"security"="is_granted('ROLE_USER')"},
 *      collectionOperations={
 *      "get"={
 *              "normalization_context"={"groups"={"show_simple"}}
 *            }
 *         },
 *      itemOperations={
 *      "get"={
 *              "normalization_context"={"groups"={"show_simple","show_detail"}}
 *            }
 *          }
 * )
 * @ORM\Entity(repositoryClass=PhoneRepository::class)
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("show_simple")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("show_simple")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("show_detail")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("show_detail")
     */
    private $description;

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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
