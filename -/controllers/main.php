<?php namespace std\fieldControls\data\controllers;

class Main extends \Controller
{
    private $model;

    private $field;

    public function __create()
    {
        $model = $this->model = $this->data['model'];
        $field = $this->field = $this->data['field'];

        $this->instance_(underscore_cell($model, $field));
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $model = $this->model;
        $field = $this->field;

        $v->assign([
                       'CONTENT' => $this->c('\std\ui\data~:view|' . $this->_nodeInstance(), [
                           'read_call'  => $this->_abs('>app:readData', ['cell' => xpack_cell($model, $field)]),
                           'write_call' => $this->_abs('>app:writeData', ['cell' => xpack_cell($model, $field)])
                       ])
                   ]);

        $this->css(':\js\jquery\ui icons');

        $this->e(underscore_field($model, $field))->rebind(':reload');

        return $v;
    }
}
