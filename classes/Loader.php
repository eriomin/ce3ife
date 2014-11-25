<?php
/**
 * Class Loader
 */
class Loader
{
    public static function load($className)
    {
        require_once __DIR__ . DS
            . str_replace('\/', DS , implode(DS, preg_split('/(?=[A-Z])/', $className, -1, PREG_SPLIT_NO_EMPTY)))
            . '.php';
    }
}