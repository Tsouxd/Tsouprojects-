<?php

namespace App\Controller\Admin;

use App\Entity\Niala;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class NialaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Niala::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("démissionnées")
            ->setEntityLabelInSingular("démissionnée")
            ->setPageTitle("index", "Motifs des démissionnées");
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextEditorField::new('motif', 'Motif de démission'),
            DateField::new('date', 'Date de démission'),
            AssociationField::new('userNiala', 'Nom de l\'employée')
            ->setRequired(true)
            ->formatValue(function ($value, $entity) {
            // Cette fonction permet d'afficher le nom du formateur dans le tableau
                $employes = $entity->getUserNiala()->first(); // Obtyenez le premier formateur de la collection
                return $employes ? $employes->getUsername() : '';
            })
            ->onlyOnIndex(), // Seulement dans la vue de tableau
            AssociationField::new('userNiala', 'Nom de l\'employée')
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
