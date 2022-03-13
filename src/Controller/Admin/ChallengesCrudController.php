<?php

namespace App\Controller\Admin;

use App\Entity\Challenges;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChallengesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Challenges::class;
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
