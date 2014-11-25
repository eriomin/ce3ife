<?php
namespace Service;
/**
 * Class Generator
 */
use Entity\Cell;
use Entity\Space;

class Generator
{
    /**
     * @return Space
     */
    public static function generateRandomSpace()
    {
        $width = mt_rand(10, 100);
        $height =  mt_rand(10, 100);
        echo "\nNEW SPACE GENERATED: $width x $height";
        return new Space($width, $height);
    }

    /**
     * @param $width
     * @param $height
     * @throws \Exception
     * @return Space
     */
    public static function generateSpace($width, $height)
    {
        if(!$width || !$height)
            throw new \Exception('Not assigned Width and Height!');
        echo "\nSPACE RESTORED: $width x $height";
        return new Space($width, $height);
    }

    /**
     * @param int $count
     * @return Cell\Pool
     */
    public static function generateRandomCells($count = 2)
    {
        $pool = new Cell\Pool();
        echo "\nGENERATE NEW CELLS:";
        for($c =1; $c <= $count; $c++) {
            $cell = new Cell(mt_rand(1, 10), mt_rand(1, 2), mt_rand(1, 10), mt_rand(0, 1), mt_rand(1, 3), self::generateVelocity());
            $pool->addCell($cell);
            echo "\n", $cell->string();
        }
        return $pool;
    }

    public static function generateVelocity()
    {
        return new \Velocity(new \Point(), new \Point());
    }

    /**
     * @param $cells
     * @return Cell\Pool
     */
    public static function generateCells($cells)
    {
        $pool = new Cell\Pool();
        foreach($cells as $cell) {
            $pool->addCell(
                new Cell(
                    (int) $cell->might,
                    (int) $cell->speed,
                    (int) $cell->defence,
                    (int) $cell->gender,
                    (int) $cell->lifePoints,
                    $cell->startPosition,
                    $cell->endPosition
                ));
        }
        return $pool;
    }
}