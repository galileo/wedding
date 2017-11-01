<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Deposit;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DepositAdmin extends AbstractAdmin
{
    public function getNewInstance()
    {
        return Deposit::provideEmpty();
    }

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
        $formMapper->add('id')
            ->add('amount')
            ->add('expense')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $mapper)
    {
        $mapper
            ->add('createdAt')
            ->add('amount');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('expense')
            ->add('amount')
            ->add('createdAt')
        ;
    }
}
