<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      attributes= {"security"="is_granted('ROLE_USER')"},
 *      collectionOperations={"get",
 *      "post"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Only admin account can create admin."
 *              }
 *          },
 *      itemOperations={"get",
 *      "delete"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Only admin account can delete admin."
 *              },
 *      "put"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="Only admin account can edit admin."
 *              }
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
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
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
