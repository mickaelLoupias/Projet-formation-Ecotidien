<?php

namespace App\Controller\Admin;

use App\Entity\Astuces;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AstucesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Astuces::class;
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
