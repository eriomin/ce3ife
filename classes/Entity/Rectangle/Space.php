<?php
namespace Entity\Rectangle;

class Space extends \Entity\Space
{
    protected $_width;
    protected $_height;

    protected $_points = [];

    public function __construct($width = 1, $height = 1, $shiftX = 0, $shiftY = 0)
    {
        $this->_points = [
            new \Point($shiftX, $shiftY),
            new \Point($shiftX, $height + $shiftY),
            new \Point($width + $shiftX, $height + $shiftY),
            new \Point($width + $shiftX, $shiftY)
        ];

        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param \Point $point
     * @return bool
     */
    public function tryPoint(\Point $point)
    {
        //TODO: Лежит ли точка в этой области
        return true;
    }

    public function tryVector(\Vector $vector)
    {
        return $this->tryPoint($vector->getStart()) && $this->tryPoint($vector->getEnd());
    }

    /**
     * @return \Point
     */
    public function getRandomPoint()
    {
        return new \Point(mt_rand(0, $this->getWidth()), mt_rand(0, $this->getHeight()));
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }
}