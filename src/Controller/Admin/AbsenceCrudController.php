<?php

namespace App\Controller\Admin;

use App\Entity\Absence;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EmployeRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class AbsenceCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getEntityFqcn(): string
    {
        return Absence::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("Absences")
            ->setEntityLabelInSingular("Absence")
            ->setPageTitle("index", "Motifs d'absences");
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            TextEditorField::new('motif', 'Motif d\'absence'),
            DateField::new('date', 'Date du jour d\'absence'),
            AssociationField::new('userAbsent', 'Nom de l\'employée')
            ->setRequired(true)
            ->formatValue(function ($value, $entity) {
            // Cette fonction permet d'afficher le nom du formateur dans le tableau
                $employes = $entity->getUserAbsent()->first(); // Obtyenez le premier formateur de la collection
                return $employes ? $employes->getUsername() : '';
            })
            ->onlyOnIndex(), // Seulement dans la vue de tableau
            AssociationField::new('userAbsent', 'Nom de l\'employée')
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
