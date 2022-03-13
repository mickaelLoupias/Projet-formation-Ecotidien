<?php

namespace App\Controller\Admin;

use App\Entity\Energydatas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EnergydatasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Energydatas::class;
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
