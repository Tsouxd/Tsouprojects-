<?php
// src/EventListener/DoctrineEventSubscriber.php
namespace App\EventListener;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class DoctrineEventSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }
     public function prePersist(LifecycleEventArgs $args)
    {
        $this->setTimestamps($args);
    }
     public function preUpdate(LifecycleEventArgs $args)
    {
        $this->setTimestamps($args);
    }
     private function setTimestamps(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
         if (method_exists($entity, 'setCreatedAt')) {
            $entity->setCreatedAt(new \DateTimeImmutable());
        }
         if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTimeImmutable());
        }
    }
}
