<?php namespace std\fieldControls\data\controllers\main;

class App extends \Controller
{
    /**
     * @var \ewma\Data\Cell
     */
    private $cell;

    public function __create()
    {
        $this->cell = $this->unpackCell() or $this->lock();
    }

    public function readData()
    {
        return _j($this->cell->value());
    }

    public function writeData()
    {
        $this->cell->value(j_($this->data('data')));
    }
}
