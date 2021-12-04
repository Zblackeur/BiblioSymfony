<?php

namespace App\Controller\Admin;

use App\Entity\Auteur;
use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('titre'),
            AssociationField::new('Auteur')
            ->onlyOnForms(),
            CollectionField::new('Auteur')
            ->hideOnForm(),
            AssociationField::new('editeur_Li'),
            TextField::new('isbn'),
            NumberField::new('prix'),
            NumberField::new('nb_pages'),
            NumberField::new('nb_exemplaires'),
            DateField::new('dateEdition'),
        ];
    }
    
}
