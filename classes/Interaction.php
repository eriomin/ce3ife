<?php

/**
 * Class Interaction
 */
use Entity\Cell;

class Interaction
{
    protected $_space;
    protected $_cellPool;

    function __construct(\Entity\Rectangle\Space $space, Cell\Pool $cellPool)
    {
        $this->_space = $space;
        $this->_cellPool = $cellPool;
    }

    function begin()
    {
        //Получаем клетки
        /** @var $multiplePositions */
        foreach($multiplePositions as $cells) {
            //Алгоритм выбора пар для контактов и контактирование
            //TODO метод выбора пары для контакта
            /** @var Cell $a */
            /** @var Cell $b */
            $this->contact($a, $b);
        }

        foreach($this->_cellPool as $cell) {
            /** @var Cell $cell */
            $cell->move();
        }
        unset($cells, $cell);

    }

    protected function contact(Cell $a, Cell $b)
    {
        if(!$a->isAlive() || !$b->isAlive()) {
            return;
        }

        if($a->getGender() === $b->getGender()) {
            if($a->getGender() === 1) {
                $this->_fight($a, $b);
            }
        } else {
            $this->_crossing($a, $b);
        }
    }

    protected function _fight(Cell $a, Cell $b)
    {
        $powerA = $b->getLifePoints() + $b->getDefence() - $a->getMight();
        $powerB = $a->getDefence() - $b->getMight();

        if($powerA === $powerB && $powerA < 0) {
            $a->setDeath();
            $b->setDeath();
        } elseif ($powerA === $powerB && $powerA === 0) {

        } elseif ($powerA > $powerB) {
            $a->setDeath();
        } else {
            $b->setDeath();
        }
    }

    protected function _crossing(Cell $a, Cell $b)
    {
        $mgt = mt_rand($a->getMight()/2, $b->getMight()/2) * 2;
        $spd = mt_rand($a->getSpeed()/2, $b->getSpeed()/2) * 2;
        $def = mt_rand($a->getDefence()/2, $b->getDefence()/2) * 2;
        $gen = mt_rand($a->getGender(), $b->getGender());
        //TODO: Возможна ситуация что клетка с потеряным здоровьем
        $maxHP = mt_rand($a->getMight()/2, $b->getMight()/2) * 2;

        $cell = new Cell($mgt, $spd, $def, $gen, $maxHP, new Velocity(new Point(), new Point()));
        //TODO: Новая скорость у клетки

        $this->pushOut($a, $b);

        $this->_cellPool[] = $cell;
    }

    protected function pushOut(Cell $a, Cell $b)
    {
        //TODO: метод преобразования координат двух отталкивающихся клеток
    }
}