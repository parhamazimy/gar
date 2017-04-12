<?php
//include "vendor/philo/laravel-blade/src/Blade.php";
//include "vendor/autoload.php";
// $tempview = __DIR__ . '/view';
// $tempstorage = __DIR__ . '/storage';
//$blade = new Philo\Blade\Blade($tempview,$tempstorage);
//$argc = ['test'=>'test'];
//echo $blade->view()->make('index',$argc)->render();
class Blade  {
    public $data;
    public function __construct()
    {
        $this->data = array();
        include "vendor/autoload.php";
        include "vendor/philo/laravel-blade/src/Blade.php";
    }
    public function data($name,$value){
        $this->data[$name]=$value;
    }

    public function display($template){
        $tempview = __DIR__ . '/../../views';
        $tempstorage = __DIR__ . '/../../cache';
        $blade = new Philo\Blade\Blade($tempview,$tempstorage);
        echo $blade->view()->make($template,$this->data)->render();
    }
}
