<?php

namespace AppBundle\Admin;

use AppBundle\Library\Infrastructure\Sonata\Helper\DatagridMapperHelper;
use AppBundle\Library\Model\UserPriceRangeCount;
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

    protected function configureDatagridFilters(DatagridMapper $mapper)
    {
        $helper = new DatagridMapperHelper($mapper);

        $helper
            ->add('name')
            ->addChoices('placement', ['Young' => 1, 'Young Parents' => 2, 'Not Decided' => 3])
            ->add('transportBefore')
            ->add('transportAfter')
            ->add('accommodation')
            ->addChoices('priceRange', array_flip(UserPriceRangeCount::$names))
            ->addChoices('side', ['Kamil' => 'kamil', 'Monika' => 'monika'])
            ->add('paar')
            ->addChoices('nextDay', ['Yes' => 1, 'No' => 0, 'Not Decided' => 3]);
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
            ->add('nextDay', null, ['template' => 'guest/list/_boolean.html.twig'])
            ->add('paar', 'boolean');
    }
}
