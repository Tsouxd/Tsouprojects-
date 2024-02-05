<?php

namespace App\Controller\Admin;

use App\Entity\FoodPlanning;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FoodPlanningCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FoodPlanning::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
