<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('author')->setLabel('Auteur'),
            AssociationField::new('category')->setLabel('Catégorie(s)'),
            TextField::new('title')->setLabel('Titre'),
            TextEditorField::new('content')->setLabel('Contenu'),
            ImageField::new('image')->setUploadDir("public/assets/blog/images")
                                    ->setBasePath("/assets/blog/images")
                                    ->setRequired(false),
        ];
    }
    
}
