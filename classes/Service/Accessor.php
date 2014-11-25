<?php
namespace Service;
/**
 * Class ServiceAccessor
 */
class Accessor
{
    private static $space;
    private static $iteration;
    private static $cells;
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $space = $this->config->get('space');
        $cells = $this->config->get('cells');
        $iteration = $this->config->get('iteration');

        $this::$space = $space
            ? Generator::generateSpace($space->width, $space->height)
            : Generator::generateRandomSpace();

        $this::$cells = $cells
            ? Generator::generateCells($cells)
            : Generator::generateRandomCells(10);

        $this::$iteration = $iteration ? : 0;
        die;
    }

    public static function getSpace()
    {
        return self::$space;
    }

    public static function getCellsPool()
    {
        return self::$cells;
    }

    public static function getIteration()
    {
        return self::$iteration;
    }

    public function save()
    {
        echo "\nSaving config data:..";
        $this->config->set('space', self::getSpace());
        $this->config->set('cells', self::getCellsPool());
        $this->config->set('iteration', self::getIteration());
        $this->config->save();
        echo "complete.";
    }
}