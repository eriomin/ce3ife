<?php
namespace Service;

use Service\Generator;
use Service\Vector;
use Service\Accessor;
use Service\Config;

class Pool
{
    private $pool;
    public function __construct()
    {
        $this->pool['config'] = new Config();
        $this->pool['accessor'] = new Accessor();
        $this->pool['generator'] = new Generator();
        $this->pool['vector'] = new Vector();
    }

    public function get($name)
    {
        return $this->pool[$name];
    }
}