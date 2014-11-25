<?php
/**
 * Class Point
 */
class Point
{
    private $_x;
    private $_y;

    public function __construct($x = 0, $y = 0)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->_x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->_x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->_y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->_y = $y;
    }

    /**
     * @return bool
     */
    public function isZero()
    {
        return $this->getX() === 0 && $this->getY() === 0;
    }
}