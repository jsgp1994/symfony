<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Course;
use App\Entity\User;
use App\Form\CourseType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class UserAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('email')
            ->add('description')
            ->add('observation')
            ->add('score')
            ->add('state')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('description')
            ->add('observation')
            ->add('score')
            ->add('state')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        // $form
        //     ->with('General Info', ['class' => 'col-md-6'])
        //         ->add('id', null, ['disabled' => true])
        //         ->add('name')
        //         ->add('email')
        //         ->add('observation')
        //     ->end()
        //     ->with('Meta data', ['class' => 'col-md-6'])
        //         ->add('description')
        //         ->add('score')
        //         ->add('course', CollectionType::class, [
        //             'entry_type' => CourseType::class,  // Aquí especificas el formulario de Course
        //             'allow_add' => true,                // Permitir agregar nuevos cursos
        //             'allow_delete' => true,             // Permitir eliminar cursos
        //             'by_reference' => false,            // Necesario para relaciones ManyToMany
        //             'prototype' => true,                // Permitir duplicación en JavaScript
        //         ])
        //         ->add('state')
        //     ->end()
        // ;
        $form
            ->with('General Info', ['class' => 'col-md-6'])
                ->add('id', null, ['disabled' => true])
                ->add('name')
                ->add('email')
                ->add('observation')
            ->end()
            ->with('Meta data', ['class' => 'col-md-6'])
                ->add('description')
                ->add('score')
                ->add('course', EntityType::class, [
                    'class' => Course::class,
                    'choice_label' => 'name',
                    'multiple' => true,     // Permite seleccionar múltiples cursos
                    'expanded' => false,    // Usa un select en lugar de checkboxes
                ])
                ->add('state')
            ->end()
        ;
        // $form
        //     ->tab('Post')
        //         ->with('Content')
        //             ->add('name')
        //         ->end()
        //     ->end()
        //     ->tab('DATA')
        //         ->with('Content')
        //             ->add('description')
        //         ->end()
        //     ->end()
        // ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('description')
            ->add('observation')
            ->add('score')
            ->add('state')
        ;
    }

    public function toString(object $object): string
    {
        return $object instanceof User
            ? $object->getName()
            : 'El curso'; // shown in the breadcrumb on the create view
    }
}
