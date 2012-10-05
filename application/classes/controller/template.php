<?php defined('SYSPATH') or die('Hacking attemp!');

class Controller_Template extends Kohana_Controller_Template
{
    public $template = 'template/default';
    public function before()
    {
       parent::before();
    }
}

