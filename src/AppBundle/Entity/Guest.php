<?php

namespace AppBundle\Entity;

/**
 * Guest
 */
class Guest
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $placement;

    /**
     * @var int
     */
    private $transportBefore;

    /**
     * @var int
     */
    private $transportAfter;

    /**
     * @var int
     */
    private $accommodation;

    /**
     * @var string
     */
    private $priceRange;

    /**
     * @var string
     */
    private $side;

    /**
     * @var int
     */
    private $nextDay;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Guest
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set placement
     *
     * @param integer $placement
     *
     * @return Guest
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return int
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set transportBefore
     *
     * @param integer $transportBefore
     *
     * @return Guest
     */
    public function setTransportBefore($transportBefore)
    {
        $this->transportBefore = $transportBefore;

        return $this;
    }

    /**
     * Get transportBefore
     *
     * @return int
     */
    public function getTransportBefore()
    {
        return $this->transportBefore;
    }

    /**
     * Set transportAfter
     *
     * @param integer $transportAfter
     *
     * @return Guest
     */
    public function setTransportAfter($transportAfter)
    {
        $this->transportAfter = $transportAfter;

        return $this;
    }

    /**
     * Get transportAfter
     *
     * @return int
     */
    public function getTransportAfter()
    {
        return $this->transportAfter;
    }

    /**
     * Set accommodation
     *
     * @param integer $accommodation
     *
     * @return Guest
     */
    public function setAccommodation($accommodation)
    {
        $this->accommodation = $accommodation;

        return $this;
    }

    /**
     * Get accommodation
     *
     * @return int
     */
    public function getAccommodation()
    {
        return $this->accommodation;
    }

    /**
     * Set priceRange
     *
     * @param string $priceRange
     *
     * @return Guest
     */
    public function setPriceRange($priceRange)
    {
        $this->priceRange = $priceRange;

        return $this;
    }

    /**
     * Get priceRange
     *
     * @return string
     */
    public function getPriceRange()
    {
        return $this->priceRange;
    }

    /**
     * Set side
     *
     * @param string $side
     *
     * @return Guest
     */
    public function setSide($side)
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get side
     *
     * @return string
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set nextDay
     *
     * @param integer $nextDay
     *
     * @return Guest
     */
    public function setNextDay($nextDay)
    {
        $this->nextDay = $nextDay;

        return $this;
    }

    /**
     * Get nextDay
     *
     * @return int
     */
    public function getNextDay()
    {
        return $this->nextDay;
    }
}

