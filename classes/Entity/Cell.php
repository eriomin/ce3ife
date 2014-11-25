<?php
namespace Entity;
/**
 * Class Cell
 */
class Cell
{
    /** @var  float */
    private $_might;
    /** @var  float */
    private $_defence;
    /** @var  integer */
    private $_speed;
    /**
     * 0 - male, 1 - female
     * @var integer $gender */
    private $_gender;
    /** @var \Velocity  */
    private $_velocity;
    /** @var boolean  */
    private $_alive;
    /** @var  integer */
    private $_lifePoints;

    public function __construct($mgt, $spd, $def, $gen, $maxHP, $velocity)
    {
        $this->_alive = true;

        $this->setMight($mgt);
        $this->setSpeed($spd);
        $this->setDefence($def);
        $this->setGender($gen);
        $this->setLifePoints($maxHP);
        $this->setVelocity($velocity);
    }

    public function string()
    {
        return sprintf(
            "STR: %s; SPD: %s; DEF: %s; GEN: %s; HP: %s",
            $this->getMight(),
            $this->getSpeed(),
            $this->getDefence(),
            $this->getGender(),
            $this->getLifePoints()
        );
    }

    public function move()
    {
        $this->_velocity->move();
    }

    public function isAlive()
    {
        return $this->_alive;
    }

    public function setDeath()
    {
        $this->_alive = false;
    }

    public function getGender()
    {
        return $this->_gender;
    }

    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    public function getMight()
    {
        return $this->_might;
    }

    public function setMight($might)
    {
        $this->_might = $might;
    }

    public function getDefence()
    {
        return $this->_defence;
    }

    public function setDefence($defence)
    {
        $this->_defence = $defence;
    }

    public function getLifePoints()
    {
        return $this->_lifePoints;
    }

    public function setLifePoints($lifePoints)
    {
        $this->_lifePoints = $lifePoints;
    }

    public function getVelocity()
    {
        return $this->_velocity;
    }

    public function setVelocity(\Velocity $movement)
    {
        $this->_velocity = $movement;
    }

    public function getSpeed()
    {
        return $this->_speed;
    }

    public function setSpeed($speed)
    {
        $this->_speed = $speed;
    }
}