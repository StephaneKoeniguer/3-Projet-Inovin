<?php

namespace App\Controller\Admin;

use App\Entity\Blog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blog::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->remove(Crud::PAGE_INDEX, Action::NEW)

        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
            return $action->setIcon('fa-solid fa-magnifying-glass')->setLabel(false);
        })

        ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
            return $action->setIcon('fa fa-edit')->setLabel(false);
        })
        ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
            return $action->setIcon('fa fa-trash')->setLabel(false);
        });
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined()
            ->setEntityLabelInSingular('Article')
            ->setEntityLabelInPlural('Blog')

            ->setPageTitle('index', 'Blog')
            ->setPageTitle('new', 'Ajouter un article')
            ->setPageTitle('detail', 'Détail de l\'article')
            ->setPageTitle('edit', 'Modifier un article')
        ;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')
            ->hideOnForm()
            ->hideOnDetail()
            ->hideOnIndex(),
            TextField::new('title')
            ->setLabel('Titre'),
            ImageField::new('image')
                ->setUploadDir('public/uploads/images/posters')
                ->setBasePath('uploads/images/posters')
                ->setSortable(false)
                ,
                DateField::new('date')
            ->setFormTypeOptions([
                'data' => new \DateTime(),
            ]),
                TextField::new('description')
                ->setSortable(false),
                TextareaField::new('text')
                ->setLabel('Article')
                ->setSortable(false),
        ];
    }
}
