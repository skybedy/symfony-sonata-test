<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

final class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('category', ModelType::class, [
                'class' => Category::class,
                'property' => 'name',
            ])
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        // ... configure $list
    }
}