<?php

namespace AppBundle\Library\Infrastructure\Sonata\Helper;

use Sonata\AdminBundle\Datagrid\DatagridMapper;

class DatagridMapperHelper
{
    /**
     * @var DatagridMapper
     */
    private $datagridMapper;

    public function __construct(DatagridMapper $datagridMapper)
    {
        $this->datagridMapper = $datagridMapper;
    }

    public function add(
        $name,
        $type = null,
        array $filterOptions = [],
        $fieldType = null,
        $fieldOptions = null,
        array $fieldDescriptionOptions = []
    ) {
        $this->datagridMapper->add($name, $type, $filterOptions, $fieldType, $fieldOptions, $fieldDescriptionOptions);

        return $this;
    }

    public function addChoices($filedName, $choices = [])
    {
        $this->add($filedName, 'doctrine_orm_string',
            [],
            'choice',
            ['choices' => $choices]
        );

        return $this;
    }
}
