<?php

namespace AppBundle\Library\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract class GenericId
{
    /**
     * @var UuidInterface
     */
    private $id;

    public function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $id
     *
     * @return static
     */
    public static function fromId($id)
    {
        return new static(Uuid::fromString($id));
    }

    /**
     * @return static
     */
    public static function generate()
    {
        return new static(Uuid::uuid4());
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id->toString();
    }
}
