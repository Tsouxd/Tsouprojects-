<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class UserCrudController extends AbstractCrudController
{
    private $passwordHasher;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->hashPassword($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    private function hashPassword(User $user)
    {
        $plainPassword = $user->getPlainPassword();

        if ($plainPassword) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
        }
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(CRUD::PAGE_INDEX, 'detail');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural("utilisateurs")
            ->setEntityLabelInSingular("utilisateur")
            ->setPageTitle("index", "Liste des utilisateurs au sein de l'entreprise");
    }

    public function configureFields(string $pageName): iterable
    {
        $sexeField = Field::new('sexe', 'Sexe')
        ->setFormType(ChoiceType::class)
        ->setFormTypeOptions([
            'choices' => [
                'Masculin' => 'Masculin',
                'Féminin' => 'Féminin',
            ],
        ]);
        $plainPasswordField = TextField::new('plainpassword','Mot de passe');
        $passwordField = TextField::new('password', 'Mot de passe');

        $fields = [
            TextField::new('username', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            ImageField::new('photo')->setBasePath('/uploads')
            ->setUploadDir('public/uploads') // Spécifiez le répertoire de téléchargement
            ->setLabel('Photo'),
            IntegerField::new('salaire', 'Salaire en ariary')->onlyOnDetail(),
            IntegerField::new('age'),
            ArrayField::new('roles', 'Role de l\'utilisateur')->onlyOnDetail(),
            TextField::new('immatriculation')->onlyOnDetail(),
            DateField::new('datedenaissance')->onlyOnDetail(),
            TextField::new('adresse'),
            TextField::new('lieudenaissance'),
        ];

        if ($pageName === Crud::PAGE_NEW) {
            $fields[] = $plainPasswordField;
        }

        if ($pageName === Crud::PAGE_DETAIL) {
            $fields[] = $passwordField;
        }
        return $fields;
    }
}
