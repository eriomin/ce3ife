<?php
namespace Entity;

class Space
{
    /** @var \Point[] $_vertices  */
    protected $_vertices = [];

    /**
     * @param \Point[] $vertices
     * @param int $shiftX
     * @param int $shiftY
     * @throws \Exception
     */
    public function __construct(array $vertices = [], $shiftX = 0, $shiftY = 0)
    {
        if(count($vertices) < 3) {
            throw new \Exception('Count of Vertices cannot be less than 3');
        }
        $this->setVertices($vertices);
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
     * @param \Point[] $vertices
     * @throws \Exception
     */
    public function setVertices(array $vertices)
    {
        foreach($vertices as $vertex) {
            if($vertex instanceof \Point) {
                $this->_vertices[] = $vertex;
            } else {
                throw new \Exception('Vertex should be instance of Point.');
            }
        }
    }

    /**
     * @return \Point[]
     */
    public function getVertices()
    {
        return $this->_vertices;
    }

    /**
     * @return \Point
     */
    public function getRandomPoint()
    {
        return new \Point(mt_rand(0, $this->getWidth()), mt_rand(0, $this->getHeight()));
    }
}