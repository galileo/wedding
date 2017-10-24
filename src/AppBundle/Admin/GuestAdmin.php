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
            ->add('placement', null, [
                'label' => 'Stolik',
            ])
            ->add('transportBefore', null, ['label' => 'Transport z Bytomia'])
            ->add('transportAfter', null, ['label' => 'Transport po weselu'])
            ->add('accommodation', null, ['label' => 'Nocleg'])
            ->add('priceRange', null, ['label' => 'Typ uczestinka'])
            ->add('side', null, ['label' => 'Z strony'])
            ->add('nextDay', null, ['label' => 'Poprawiny']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('placement', null, [
                'label' => 'Stolik',
                'template' => '::_placement.html.twig'
            ])
            ->add('transportBefore', null, ['label' => 'Transport z Bytomia'])
            ->add('transportAfter', null, ['label' => 'Transport po weselu'])
            ->add('accommodation', null, ['label' => 'Nocleg'])
            ->add('priceRange', null, ['label' => 'Typ uczestinka'])
            ->add('side', null, ['label' => 'Z strony'])
            ->add('nextDay', null, ['label' => 'Poprawiny']);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, ['label' => 'Gość'])
            ->add('placement', null, [
                'label' => 'Stolik',
                'template' => 'guest/list/_placement.html.twig'
            ])
            ->add('transportBefore', 'boolean', ['label' => 'Transport z Bytomia'])
            ->add('transportAfter', 'boolean', ['label' => 'Transport po weselu'])
            ->add('accommodation', 'boolean', ['label' => 'Nocleg'])
            ->add('priceRange', null, [
                'label' => 'Typ uczestinka',
                'template' => 'guest/list/_priceRange.html.twig',
            ])
            ->add('side', null, ['label' => 'Z strony'])
            ->add('nextDay', 'boolean', ['label' => 'Poprawiny']);
    }
}
