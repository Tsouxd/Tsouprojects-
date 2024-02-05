<?php

namespace App\Controller\Admin;

use App\Entity\Presence;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\PresenceRepository;

class PresenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presence::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("présences")
            ->setEntityLabelInSingular("présence")
            ->setPageTitle("index", "Liste des personnes présentes");
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            //DateTimeField::new('dateentryday', 'Date et heure d\'arrivé dans l\'entreprise'),
            //DateTimeField::new('dateoutday', 'Date et heure de sortie dans l\'entreprise'),
            DateTimeField::new('createdAt','Date et heure d\'arrivé dans l\'entreprise')->onlyOnIndex(),
            //DateTimeField::new('updatedAt')->onlyOnIndex(),
            AssociationField::new('userPresent', 'Nom de l\'employée')
            ->setRequired(true)
            ->formatValue(function ($value, $entity) {
            // Cette fonction permet d'afficher le nom du formateur dans le tableau
                $employes = $entity->getUserPresent()->first(); // Obtyenez le premier formateur de la collection
                return $employes ? $employes->getUsername() : '';
            })
            ->onlyOnIndex(), // Seulement dans la vue de tableau
            AssociationField::new('userPresent', 'Nom de l\'employée')
            ->setRequired(true)
            ->setFormType(EntityType::class) // Utilisez le type de formulaire EntityType
            ->setFormTypeOptions([
                'class' => User::class, // Classe cible
                'choice_label' => 'username', // Nom de la propriété à afficher
            ])
            ->onlyOnForms(),
        ];
        return $fields;
    }
}
