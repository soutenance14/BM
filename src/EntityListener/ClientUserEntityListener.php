<?php

namespace App\EntityListener;

use App\Entity\User;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ClientUserEntityListener
{
  private $tokenStorage;

  public function __construct(TokenStorageInterface $tokenStorage)
  {
      $this->tokenStorage = $tokenStorage;
  }

  public function prePersist(User $user)
  {
    // for data fixtures, tokenStorage->getToken is null
    // you can comment this after execute all fixtures
    if(null !== $this->tokenStorage->getToken() && null !== $this->tokenStorage->getToken()->getUser())
    {
      $user->setClient($this->tokenStorage->getToken()->getUser());
    }
  }

}