<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ExpenseAdmin extends AbstractAdmin
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
        $formMapper->add('name')
            ->add('amount');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('deposits')
            ->add('amount');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('deposits')
            ->add('amount')
            ->add('leftToPay')
        ;
    }
}
