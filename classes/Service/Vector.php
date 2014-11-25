<?php
namespace Service;
/**
 * Class ServiceVector
 */
class Vector
{
    public function Composition(\Vector $a, \Vector $b)
    {
        return new \Vector(
            new \Point(
                $a->getStart()->getX() + $b->getStart()->getX(),
                $a->getStart()->getX() + $b->getStart()->getX()),
            new \Point(
                $a->getEnd()->getX() + $b->getEnd()->getX(),
                $a->getEnd()->getY() + $b->getEnd()->getY())
        );
    }

    public function Subtraction(\Vector $a, \Vector $b)
    {
        return new \Vector(
            new \Point(
                $a->getStart()->getX() - $b->getStart()->getX(),
                $a->getStart()->getX() - $b->getStart()->getX()),
            new \Point(
                $a->getEnd()->getX() - $b->getEnd()->getX(),
                $a->getEnd()->getY() - $b->getEnd()->getY())
        );
    }
}