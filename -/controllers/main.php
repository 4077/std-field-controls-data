<?php namespace std\fieldControls\data\controllers;

class Main extends \Controller
{
    /**
     * @var \ewma\Data\Cell
     */
    private $cell;

    public function __create()
    {
        $this->cell = $this->unpackCell();

        $this->instance_($this->cell->xpack());
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $cell = $this->cell;

        $v->assign([
                       'CONTENT' => $this->c('\std\ui\data~:view|' . $this->_nodeInstance(), [
                           'read_call'  => $this->_abs('>app:readData', ['cell' => $cell->xpack()]),
                           'write_call' => $this->_abs('>app:writeData', ['cell' => $cell->xpack()])
                       ])
                   ]);

        $this->css(':\js\jquery\ui icons');

        if (!$this->app->html->containerAdded($this->_nodeId())) {
            $this->app->html->addContainer($this->_nodeId(), $this->c('eventsDispatcher:view'));
        }

        return $v;
    }
}
