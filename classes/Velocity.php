<?php
use Service\Accessor;

class Velocity extends Vector
{
    private $_speed;

    /**
     * @param Point $start
     * @param Point $end
     * @param $speed
     */
    public function __construct(Point $start, Point $end, $speed = null)
    {
        parent::__construct($start, $end);
        $this->setSpeed($speed);
    }

    /**
     * @param bool $force
     * @return $this
     */
    public function setRandomPositions($force = false)
    {
        if(is_null($this->getStart()) || $force) {
            //TODO: Нужно проверять не находится ли в этой позиции другая клетка
            $this->setStart(Accessor::getSpace()->getRandomPoint());
        }
        if(is_null($this->getEnd())) {
            $start = $this->getStart();
            $this->setEnd(new Point(
                $start->getX() + $this->getSpeed() * cos(mt_rand(0, 360)),
                $start->getY() + $this->getSpeed() * sin(mt_rand(0, 360))
            ));
        }
        return $this;
    }

    public function move()
    {
        $start = $this->getStart();
        $end   = $this->getEnd();

        $this->setStart($start);

        $possibleEnd = new Point(
            $end->getX() + ($end->getX() - $start->getX()),
            $end->getY() + ($end->getY() - $start->getY())
        );
        //TODO: Учесть границы пространства, что бы клетка не вышла за пределы пространства
        if(Accessor::getSpace()->tryPoint($possibleEnd)) {
            $this->setEnd($possibleEnd);
        } else {
            //TODO: Просто кидается если в не предела в рандомную позицию
            $this->setRandomPositions();
        }

    }

    /**
     * @param $speed
     */
    public function setSpeed($speed)
    {
        $this->_speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->_speed;
    }

}