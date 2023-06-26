<?php

namespace App\Controller\Admin;

use App\Entity\Vin;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vin::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex(),
            TextField::new('nom'),
            TextareaField::new('description'),
            // TextEditorField::new('description'),
            TextField::new('region'),
            IntegerField::new('millesime'),
            NumberField::new('degreAlcool'),
            NumberField::new('prix'),
            ImageField::new('image')->setUploadDir('public/uploads/images/posters')->hideOnIndex(),

            // CollectionField::new('ficheDegustations'),
            // CollectionField::new('favoris'),
            // CollectionField::new('recettes'),
            // CollectionField::new('caracteristiques'),
            // CollectionField::new('cepages'),

            TextField::new('couleur'),
            TextField::new('limpidite'),
            TextField::new('fluidite'),
            IntegerField::new('brillance'),
            ArrayField::new('arome'),

            IntegerField::new('intensite'),
            IntegerField::new('douceur'),
            IntegerField::new('alcool'),

            TextField::new('persistance'),
            TextField::new('structure'),
            TextField::new('matiere'),

        ];
    }
}