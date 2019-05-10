<?php namespace std\fieldControls\data\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function reload()
    {
        if ($cell = $this->unxpackCell()) {
            $this->c('~:reload', [], 'cell');
        }
    }
}
