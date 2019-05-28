<?php
/**
 * Created by PhpStorm.
 * User: arkadiy
 * Date: 28.05.19
 * Time: 14:55
 */

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogAdmin extends AbstractAdmin
{
    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('title')
            ->add('created_at')
            ->add('description')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('title')
            ->add('created_at')
            ->add('description')
        ;
    }

    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('title')
            ->add('created_at')
            ->add('description')
        ;
    }

}