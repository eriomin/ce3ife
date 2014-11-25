<?php

/**
 * Class Vector
 */
class Vector
{
    /** @var  Point */
    private $start;
    /** @var  Point */
    private $end;

    /**
     * @param Point $start
     * @param Point $end
     */
    public function __construct(\Point $start, \Point $end)
    {
        $this->setStart($start);
        $this->setEnd($end);
    }

    /**
     * @return Point
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Point $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return Point
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param Point $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    public function __toString()
    {
        return "[({$this->getStart()->getX()}; {$this->getStart()->getY()});
        ({$this->getEnd()->getX()}; {$this->getEnd()->getY()})]";
    }
}