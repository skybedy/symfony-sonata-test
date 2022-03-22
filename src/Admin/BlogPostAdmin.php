<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use App\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

final class BlogPostAdmin extends AbstractAdmin
{
    
    
    
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('Content')
                ->add('title', TextType::class)
                ->add('body', TextareaType::class)
            ->end()
            ->with('Meta data')
                ->add('category', ModelType::class, [
                    'class' => Category::class,
                    'property' => 'name',
                ])
            ->end()
        ;
    }


    protected function configureListFields(ListMapper $list): void
    {
        $list
        ->addIdentifier('title')
        ->add('category.name')
                    ->add('draft')
        ;
    }
    
    
    public function toString(object $object): string
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid
        ->add('title')
        ->add('category', null, [
            'field_type' => EntityType::class,
            'field_options' => [
                'class' => Category::class,
                'choice_label' => 'name',
            ],
        ])
    ;
}  




 











}   



    