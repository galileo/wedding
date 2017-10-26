<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class GuestAdmin extends AbstractAdmin
{
    function getFormBuilder()
    {
        $this->formOptions['data_class'] = $this->getClass();
        $this->formOptions['csrf_protection'] = false;
        $formBuilder = $this->getFormContractor()->getFormBuilder(
            $this->getUniqid(),
            $this->formOptions
        );
        $this->defineFormBuilder($formBuilder);

        return $formBuilder;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', 'text')
            ->add('placement')
            ->add('transportBefore')
            ->add('transportAfter')
            ->add('accommodation')
            ->add('priceRange')
            ->add('side')
            ->add('paar')
            ->add('nextDay');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('placement', null, [
                'template' => '::_placement.html.twig'
            ])
            ->add('transportBefore')
            ->add('transportAfter')
            ->add('accommodation')
            ->add('priceRange')
            ->add('side')
            ->add('paar')
            ->add('nextDay');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, ['label' => 'Guest'])
            ->add('placement', null, [
                'template' => 'guest/list/_placement.html.twig'
            ])
            ->add('transportBefore', 'boolean')
            ->add('transportAfter', 'boolean')
            ->add('accommodation', 'boolean')
            ->add('priceRange', null, [
                'template' => 'guest/list/_priceRange.html.twig',
            ])
            ->add('side')
            ->add('nextDay', 'boolean')
            ->add('paar', 'boolean');
    }
}
