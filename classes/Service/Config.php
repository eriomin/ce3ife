<?php
namespace Service;
/**
 * Class Config
 */
class Config
{
    private $plain;
    private $path;

    private $cells;
    private $space;
    private $iteration;

    private $data;

    /**
     * @param string $path
     * @throws \Exception
     */
    public function __construct($path)
    {
        $this->path = $path;
        if(file_exists($path)) {
            $this->plain = file_get_contents($path);
            $this->data = json_decode($this->plain);
        } else {
            throw new \Exception('Config data not found!');
        }
        $this->load();
    }

    /**
     *
     */
    private function load()
    {
        $this->cells = isset($this->data->cells) ? $this->data->cells : null;
        $this->space = isset($this->data->space) ? $this->data->space : null;
        $this->iteration = isset($this->data->iteration) ? $this->data->iteration : null;
    }

    /**
     * @param null $param
     */
    public function clear($param = null)
    {
        if(!is_null($param)) {
            $this->data->$param = null;
        } else {
            $this->data = null;
        }
    }

    /**
     * @return int
     */
    public function save()
    {
        return file_put_contents($this->path, json_encode($this->data));
    }

    /**
     * @param $param
     * @return bool
     */
    public function has($param)
    {
        return isset($this->data->$param);
    }

    /**
     * @param $param
     * @param $default
     * @return mixed
     */
    public function get($param, $default = null)
    {
        return $this->has($param) ? $this->data->$param : $default;
    }

    /**
     * @param string $param
     * @param $data
     */
    public function set($param, $data)
    {
        $this->data->$param = $data;
    }

    /**
     * @return string
     */
    public function getPlainText()
    {
        return $this->plain;
    }
}